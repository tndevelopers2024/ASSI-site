<?php
/**
 * ASSI Automated Subscription Expiry Reminder Runner
 *
 * This script scans all registered members, calculates their subscription
 * expiration dates, determines if they are due for a reminder (3 months,
 * 1 month, 1 week, or 1 day before expiry), and sends notifications.
 *
 * Modes:
 *  - DRY_RUN : Analyzes all users and reports who is due without sending emails.
 *  - TEST    : Sends all eligible reminders to a safe test email address.
 *  - LIVE    : Sends reminders to actual member email addresses.
 *
 * Usage:
 *  CLI:
 *    php send_expiry_reminders.php --mode=dry_run
 *    php send_expiry_reminders.php --mode=test --test_email=admin@example.com
 *    php send_expiry_reminders.php --mode=live
 *
 *  HTTP (cPanel / Web Cron):
 *    https://yourdomain.com/cron/send_expiry_reminders.php?token=assi_sub_cron_2025_secure&mode=dry_run
 *    https://yourdomain.com/cron/send_expiry_reminders.php?token=assi_sub_cron_2025_secure&mode=test&test_email=admin@example.com
 *    https://yourdomain.com/cron/send_expiry_reminders.php?token=assi_sub_cron_2025_secure&mode=live
 *
 * Location: /cron/send_expiry_reminders.php
 */

// Set time limit for larger databases
set_time_limit(300);

require_once __DIR__ . '/subscription_mail_config.php';
require_once __DIR__ . '/subscription_helper.php';
require_once __DIR__ . '/email_templates.php';
require_once __DIR__ . '/mailer_service.php';

$isCli = (php_sapi_name() === 'cli');

/* =====================================================================
 * 1. PARAMETERS & SECURITY CHECK
 * ===================================================================== */
$requestedMode = null;
$overrideTestEmail = null;

if ($isCli) {
    // Parse CLI options
    $options = getopt('', ['mode:', 'test_email:', 'help']);
    if (isset($options['help'])) {
        echo "ASSI Subscription Expiry Mailer\n";
        echo "Usage: php send_expiry_reminders.php [--mode=dry_run|test|live] [--test_email=user@domain.com]\n";
        exit(0);
    }
    $requestedMode = $options['mode'] ?? null;
    $overrideTestEmail = $options['test_email'] ?? null;
} else {
    // Web / HTTP Request: Validate Security Token
    $token = $_GET['token'] ?? '';
    if ($token !== CRON_SECURITY_TOKEN) {
        http_response_code(403);
        header('Content-Type: application/json');
        echo json_encode([
            'status'  => 'error',
            'message' => 'Unauthorized: Invalid or missing security token.'
        ], JSON_PRETTY_PRINT);
        exit();
    }
    $requestedMode = $_GET['mode'] ?? null;
    $overrideTestEmail = $_GET['test_email'] ?? null;
}

// Determine active execution mode
// Default is DRY_RUN unless SUBSCRIPTION_LIVE_MODE is true or explicitly requested
if ($requestedMode === 'live') {
    $executionMode = 'LIVE';
} elseif ($requestedMode === 'test') {
    $executionMode = 'TEST';
} elseif ($requestedMode === 'dry_run') {
    $executionMode = 'DRY_RUN';
} else {
    // Fallback based on config
    $executionMode = SUBSCRIPTION_LIVE_MODE ? 'LIVE' : 'DRY_RUN';
}

$testRecipient = !empty($overrideTestEmail) ? trim($overrideTestEmail) : DEFAULT_TEST_EMAIL;

/* =====================================================================
 * 2. DATABASE INITIALIZATION
 * ===================================================================== */
if (!$conn) {
    $errorMsg = "Database connection not available.";
    logSubscriptionMessage($errorMsg, 'ERROR');
    if ($isCli) {
        echo "[ERROR] $errorMsg\n";
    } else {
        echo "<h3>Error: $errorMsg</h3>";
    }
    exit(1);
}

// Ensure tracking table exists
ensureNotificationTableExists($conn);

logSubscriptionMessage("Starting Expiry Reminders Runner. Mode: {$executionMode}", 'INFO');

/* =====================================================================
 * 3. FETCH AND PROCESS MEMBERS
 * ===================================================================== */
$query = "SELECT id, user_id, fullname, email, phonenumber, lastpaid_date, membership_plan, membership_category 
          FROM users 
          WHERE email IS NOT NULL AND email != '' 
          ORDER BY id ASC";

$result = mysqli_query($conn, $query);

if (!$result) {
    $errorMsg = "Failed to fetch users: " . mysqli_error($conn);
    logSubscriptionMessage($errorMsg, 'ERROR');
    if ($isCli) {
        echo "[ERROR] $errorMsg\n";
    } else {
        echo "<h3>Error: $errorMsg</h3>";
    }
    exit(1);
}

$today = new DateTime('today');
$stats = [
    'total_users'          => 0,
    'lifetime_users'       => 0,
    'unknown_expiry'       => 0,
    'future_active'        => 0,
    'expired_past_window'  => 0,
    'due_3_months'         => 0,
    'due_1_month'          => 0,
    'due_1_week'           => 0,
    'due_1_day'            => 0,
    'due_expired_today'    => 0,
    'due_expired_1_week'   => 0,
    'due_expired_1_month'  => 0,
    'due_expired_3_months' => 0,
    'already_sent'         => 0,
    'emails_sent'          => 0,
    'emails_failed'        => 0,
    'dry_run_queued'       => 0
];

$processedDetails = [];

while ($user = mysqli_fetch_assoc($result)) {
    $stats['total_users']++;

    $calc = calculateUserSubscriptionExpiry($user);

    if ($calc['is_lifetime']) {
        $stats['lifetime_users']++;
        continue;
    }

    if (!$calc['expiry_date']) {
        $stats['unknown_expiry']++;
        continue;
    }

    $expiryDate = $calc['expiry_date'];
    $expiryStr = $calc['expiry_str'];
    $expiryFormatted = $expiryDate->format('d M Y');

    // Calculate difference in whole days
    $diff = $today->diff($expiryDate);
    $daysRemaining = (int)$diff->format('%r%a');

    // If expired more than 90 days ago, it is past the 3-month notification window
    if ($daysRemaining < -90) {
        $stats['expired_past_window']++;
        continue;
    }

    // Determine milestone stage (pre-expiry, on-expiry, and post-expiry)
    $stage = getApplicableMilestoneStage($daysRemaining);

    if (!$stage) {
        if ($daysRemaining > 90) {
            $stats['future_active']++;
        }
        continue;
    }

    // Count due per stage
    if (isset($stats['due_' . $stage])) {
        $stats['due_' . $stage]++;
    }

    $membershipId = !empty($user['user_id']) ? $user['user_id'] : (string)$user['id'];

    // Check if notification already sent for this cycle
    $alreadySent = hasNotificationBeenSent($conn, $membershipId, $stage, $expiryStr);
    if ($alreadySent) {
        $stats['already_sent']++;
        continue;
    }

    // Build the email
    $emailData = buildSubscriptionExpiryEmail($user, $stage, $expiryFormatted, $daysRemaining);

    $entry = [
        'user_id'        => $membershipId,
        'name'           => $user['fullname'],
        'email'          => $user['email'],
        'category'       => $user['membership_category'],
        'plan'           => $user['membership_plan'],
        'expiry_date'    => $expiryStr,
        'days_remaining' => $daysRemaining,
        'stage'          => $stage,
        'status'         => 'PENDING',
        'message'        => ''
    ];

    if ($executionMode === 'DRY_RUN') {
        $stats['dry_run_queued']++;
        $entry['status'] = 'DRY_RUN (Eligible)';
        $entry['message'] = "Simulated notification for {$stage} ({$daysRemaining} days remaining)";

        // Optionally record in database as DRY_RUN
        recordNotificationSent($conn, [
            'user_db_id'         => $user['id'],
            'membership_user_id' => $membershipId,
            'recipient_email'    => $user['email'],
            'recipient_name'     => $user['fullname'],
            'notification_stage' => $stage,
            'expiry_date'        => $expiryStr,
            'days_remaining'     => $daysRemaining,
            'status'             => 'DRY_RUN',
            'mode'               => 'DRY_RUN',
            'error_message'      => 'Dry run simulation'
        ]);

    } elseif ($executionMode === 'TEST') {
        // Send email to test recipient instead of real user
        if (empty($testRecipient)) {
            $entry['status'] = 'FAILED';
            $entry['message'] = 'No test recipient email specified';
            $stats['emails_failed']++;
        } else {
            $testSubject = "[TEST - For: {$user['fullname']} ({$user['email']})] " . $emailData['subject'];
            $sendRes = sendSubscriptionMail($testRecipient, "Test Recipient", $testSubject, $emailData['html'], $emailData['text']);

            if ($sendRes['success']) {
                $stats['emails_sent']++;
                $entry['status'] = 'TEST_SENT';
                $entry['message'] = "Sent test mail to {$testRecipient}";

                recordNotificationSent($conn, [
                    'user_db_id'         => $user['id'],
                    'membership_user_id' => $membershipId,
                    'recipient_email'    => $user['email'],
                    'recipient_name'     => $user['fullname'],
                    'notification_stage' => $stage,
                    'expiry_date'        => $expiryStr,
                    'days_remaining'     => $daysRemaining,
                    'status'             => 'TEST_SENT',
                    'mode'               => 'TEST',
                    'error_message'      => "Redirected to test email: {$testRecipient}"
                ]);
            } else {
                $stats['emails_failed']++;
                $entry['status'] = 'FAILED';
                $entry['message'] = $sendRes['message'];

                recordNotificationSent($conn, [
                    'user_db_id'         => $user['id'],
                    'membership_user_id' => $membershipId,
                    'recipient_email'    => $user['email'],
                    'recipient_name'     => $user['fullname'],
                    'notification_stage' => $stage,
                    'expiry_date'        => $expiryStr,
                    'days_remaining'     => $daysRemaining,
                    'status'             => 'FAILED',
                    'mode'               => 'TEST',
                    'error_message'      => $sendRes['message']
                ]);
            }
        }

    } elseif ($executionMode === 'LIVE') {
        // Live send to member
        $sendRes = sendSubscriptionMail($user['email'], $user['fullname'], $emailData['subject'], $emailData['html'], $emailData['text']);

        if ($sendRes['success']) {
            $stats['emails_sent']++;
            $entry['status'] = 'SENT';
            $entry['message'] = 'Delivered to ' . $user['email'];

            recordNotificationSent($conn, [
                'user_db_id'         => $user['id'],
                'membership_user_id' => $membershipId,
                'recipient_email'    => $user['email'],
                'recipient_name'     => $user['fullname'],
                'notification_stage' => $stage,
                'expiry_date'        => $expiryStr,
                'days_remaining'     => $daysRemaining,
                'status'             => 'SENT',
                'mode'               => 'LIVE',
                'error_message'      => null
            ]);
        } else {
            $stats['emails_failed']++;
            $entry['status'] = 'FAILED';
            $entry['message'] = $sendRes['message'];

            recordNotificationSent($conn, [
                'user_db_id'         => $user['id'],
                'membership_user_id' => $membershipId,
                'recipient_email'    => $user['email'],
                'recipient_name'     => $user['fullname'],
                'notification_stage' => $stage,
                'expiry_date'        => $expiryStr,
                'days_remaining'     => $daysRemaining,
                'status'             => 'FAILED',
                'mode'               => 'LIVE',
                'error_message'      => $sendRes['message']
            ]);
        }
    }

    $processedDetails[] = $entry;
}

$summaryMsg = "Completed Expiry Reminders. Mode: {$executionMode} | Total Users: {$stats['total_users']} | Sent: {$stats['emails_sent']} | Queued/Dry: {$stats['dry_run_queued']} | Failed: {$stats['emails_failed']} | Already Sent: {$stats['already_sent']}";
logSubscriptionMessage($summaryMsg, 'INFO');

/* =====================================================================
 * 4. OUTPUT FORMATTING (CLI vs BROWSER)
 * ===================================================================== */
if ($isCli) {
    echo "========================================================\n";
    echo " ASSI SUBSCRIPTION EXPIRY NOTIFICATION RUNNER\n";
    echo "========================================================\n";
    echo " Execution Mode:           $executionMode\n";
    echo " Total Users:              {$stats['total_users']}\n";
    echo " Life Members (Skip):      {$stats['lifetime_users']}\n";
    echo " Active (>90 Days):        {$stats['future_active']}\n";
    echo " Expired (>90 Days Past):  {$stats['expired_past_window']}\n";
    echo "--------------------------------------------------------\n";
    echo " [BEFORE EXPIRY]\n";
    echo "  - Due for 3 Months:      {$stats['due_3_months']}\n";
    echo "  - Due for 1 Month:       {$stats['due_1_month']}\n";
    echo "  - Due for 1 Week:        {$stats['due_1_week']}\n";
    echo "  - Due for 1 Day:         {$stats['due_1_day']}\n";
    echo " [ON EXPIRY & AFTER EXPIRY]\n";
    echo "  - Expiring Date (Today): {$stats['due_expired_today']}\n";
    echo "  - 1 Week After Expired:  {$stats['due_expired_1_week']}\n";
    echo "  - 1 Month After Expired: {$stats['due_expired_1_month']}\n";
    echo "  - 3 Months After Expired:{$stats['due_expired_3_months']}\n";
    echo "--------------------------------------------------------\n";
    echo " Already Sent Cycle:       {$stats['already_sent']}\n";
    if ($executionMode === 'DRY_RUN') {
        echo " Dry-Run Simulated:        {$stats['dry_run_queued']}\n";
    } else {
        echo " Emails Sent:              {$stats['emails_sent']}\n";
        echo " Emails Failed:            {$stats['emails_failed']}\n";
    }
    echo "========================================================\n\n";

    if (!empty($processedDetails)) {
        echo sprintf("%-12s | %-20s | %-16s | %-12s | %-12s\n", "User ID", "Name", "Stage", "Expiry", "Status");
        echo str_repeat("-", 82) . "\n";
        foreach ($processedDetails as $d) {
            echo sprintf("%-12s | %-20s | %-16s | %-12s | %-12s\n", 
                substr($d['user_id'], 0, 12), 
                substr($d['name'], 0, 20), 
                $d['stage'], 
                $d['expiry_date'], 
                $d['status']
            );
        }
    } else {
        echo "No members currently match the reminder thresholds or all have already been notified.\n";
    }
    exit(0);
}

// Browser / Web Output (JSON or HTML)
$format = $_GET['format'] ?? 'html';
if ($format === 'json') {
    header('Content-Type: application/json');
    echo json_encode([
        'status'    => 'success',
        'mode'      => $executionMode,
        'stats'     => $stats,
        'processed' => $processedDetails
    ], JSON_PRETTY_PRINT);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ASSI Subscription Mailer Execution</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body { background: #f8fafc; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; padding: 40px 20px; }
    .card { border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.06); border: none; }
    .card-header { background: #1b56a5; color: #fff; border-radius: 12px 12px 0 0 !important; padding: 20px 25px; }
    .stat-badge { font-size: 20px; font-weight: 700; }
  </style>
</head>
<body>
<div class="container" style="max-width: 1000px;">
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div>
        <h3 class="m-0 fs-4">ASSI Subscription Expiry Mailer</h3>
        <small class="opacity-75">Automated Notification Runner (Pre & Post Expiry)</small>
      </div>
      <span class="badge <?php echo $executionMode === 'LIVE' ? 'bg-danger' : ($executionMode === 'TEST' ? 'bg-warning text-dark' : 'bg-info'); ?> fs-6 px-3 py-2">
        Mode: <?php echo $executionMode; ?>
      </span>
    </div>
    <div class="card-body p-4">
      <div class="row g-2 text-center mb-4">
        <div class="col-md-3 col-6">
          <div class="p-2 bg-light rounded border">
            <div class="text-muted small">Total Members</div>
            <div class="stat-badge text-primary"><?php echo $stats['total_users']; ?></div>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="p-2 bg-light rounded border">
            <div class="text-muted small">Due (3 Mo / 1 Mo)</div>
            <div class="stat-badge text-warning"><?php echo ($stats['due_3_months'] + $stats['due_1_month']); ?></div>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="p-2 bg-light rounded border">
            <div class="text-muted small">Due (1 Wk / 1 Day)</div>
            <div class="stat-badge text-danger"><?php echo ($stats['due_1_week'] + $stats['due_1_day']); ?></div>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="p-2 bg-light rounded border">
            <div class="text-muted small">Expires Today</div>
            <div class="stat-badge text-danger fw-bold"><?php echo $stats['due_expired_today']; ?></div>
          </div>
        </div>
        <div class="col-md-4 col-6 mt-2">
          <div class="p-2 bg-light rounded border">
            <div class="text-muted small">Expired 1 Wk (Grace)</div>
            <div class="stat-badge text-orange" style="color:#c2410c;"><?php echo $stats['due_expired_1_week']; ?></div>
          </div>
        </div>
        <div class="col-md-4 col-6 mt-2">
          <div class="p-2 bg-light rounded border">
            <div class="text-muted small">Expired 1 Mo (Suspended)</div>
            <div class="stat-badge text-danger"><?php echo $stats['due_expired_1_month']; ?></div>
          </div>
        </div>
        <div class="col-md-4 col-12 mt-2">
          <div class="p-2 bg-light rounded border">
            <div class="text-muted small">Expired 3 Mo (Inactive)</div>
            <div class="stat-badge text-dark"><?php echo $stats['due_expired_3_months']; ?></div>
          </div>
        </div>
      </div>

      <div class="alert alert-info">
        <strong>Execution Summary:</strong> <?php echo $summaryMsg; ?>
      </div>

      <?php if (!empty($processedDetails)): ?>
        <h5 class="mt-4 mb-3">Processed Members In This Run</h5>
        <div class="table-responsive">
          <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Expiry</th>
                <th>Days</th>
                <th>Stage</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($processedDetails as $d): ?>
                <tr>
                  <td><code><?php echo htmlspecialchars($d['user_id']); ?></code></td>
                  <td><?php echo htmlspecialchars($d['name']); ?></td>
                  <td><?php echo htmlspecialchars($d['email']); ?></td>
                  <td><?php echo htmlspecialchars($d['expiry_date']); ?></td>
                  <td><span class="badge bg-secondary"><?php echo $d['days_remaining']; ?>d</span></td>
                  <td><span class="badge bg-primary"><?php echo $d['stage']; ?></span></td>
                  <td>
                    <?php if (strpos($d['status'], 'SENT') !== false): ?>
                      <span class="badge bg-success"><?php echo $d['status']; ?></span>
                    <?php elseif (strpos($d['status'], 'DRY_RUN') !== false): ?>
                      <span class="badge bg-info text-dark"><?php echo $d['status']; ?></span>
                    <?php else: ?>
                      <span class="badge bg-danger"><?php echo $d['status']; ?></span>
                    <?php endif; ?>
                    <small class="d-block text-muted"><?php echo htmlspecialchars($d['message']); ?></small>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <div class="alert alert-secondary">
          No members are currently in the 3-month, 1-month, 1-week, or 1-day notification windows, or they have already received their notification for this cycle.
        </div>
      <?php endif; ?>

      <div class="mt-4 pt-3 border-top d-flex justify-content-between">
        <a href="test_subscription_alerts.php" class="btn btn-outline-primary">Open Testing & Control Center &rarr;</a>
        <a href="<?php echo $_SERVER['PHP_SELF'] . '?token=' . CRON_SECURITY_TOKEN . '&mode=dry_run'; ?>" class="btn btn-secondary">Re-run Dry Run</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>
