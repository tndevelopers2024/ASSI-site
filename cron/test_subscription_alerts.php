<?php
/**
 * ASSI Subscription Expiry Notification - Testing & Control Center
 * 
 * Allows administrators and developers to:
 * 1. Test sending sample emails to their own inbox for all 4 stages.
 * 2. Preview which members are nearing expiration without emailing them (Dry-Run).
 * 3. Inspect calculated expiration dates across all members in the database.
 * 4. View sent notification history and logs.
 * 5. Easily switch to LIVE mode when ready.
 *
 * Location: /cron/test_subscription_alerts.php
 */

require_once __DIR__ . '/subscription_mail_config.php';
require_once __DIR__ . '/subscription_helper.php';
require_once __DIR__ . '/email_templates.php';
require_once __DIR__ . '/mailer_service.php';

// Ensure table exists
if ($conn) {
    ensureNotificationTableExists($conn);
}

$message = null;
$messageType = 'info';

// Handle Single Sample Email Send to specified test inbox
if (isset($_POST['send_sample_email'])) {
    $testTo = trim($_POST['test_email'] ?? '');
    $selectedStage = trim($_POST['stage'] ?? '3_months');
    $sampleName = trim($_POST['sample_name'] ?? 'Dr. Arun Kumar');
    $sampleId = trim($_POST['sample_id'] ?? 'ASSI-LM-1042');
    $sampleCategory = trim($_POST['sample_category'] ?? 'VAAS / Annual');
    $samplePlan = trim($_POST['sample_plan'] ?? '3 Years');

    if (!filter_var($testTo, FILTER_VALIDATE_EMAIL)) {
        $message = "Please enter a valid test recipient email address.";
        $messageType = "danger";
    } else {
        // Calculate sample expiry date for display
        $days = 90;
        if ($selectedStage === '1_month') $days = 30;
        elseif ($selectedStage === '1_week')  $days = 7;
        elseif ($selectedStage === '1_day')   $days = 1;
        elseif ($selectedStage === 'expired_today') $days = 0;
        elseif ($selectedStage === 'expired_1_week') $days = -7;
        elseif ($selectedStage === 'expired_1_month') $days = -30;
        elseif ($selectedStage === 'expired_3_months') $days = -90;

        $sampleExpiry = new DateTime();
        if ($days >= 0) {
            $sampleExpiry->modify("+{$days} days");
        } else {
            $absDays = abs($days);
            $sampleExpiry->modify("-{$absDays} days");
        }
        $formattedExpiry = $sampleExpiry->format('d F Y');

        $sampleUser = [
            'fullname'            => $sampleName,
            'user_id'             => $sampleId,
            'email'               => $testTo,
            'membership_category' => $sampleCategory,
            'membership_plan'     => $samplePlan
        ];

        $emailData = buildSubscriptionExpiryEmail($sampleUser, $selectedStage, $formattedExpiry, $days);
        $subject = "[SAMPLE TEST] " . $emailData['subject'];

        $res = sendSubscriptionMail($testTo, $sampleName, $subject, $emailData['html'], $emailData['text'], true);

        if ($res['success']) {
            $message = "Sample email for stage <strong>{$selectedStage}</strong> sent successfully to <strong>{$testTo}</strong>! Please check your inbox (and spam/promotions folder).";
            $messageType = "success";
            logSubscriptionMessage("Manual sample email for stage {$selectedStage} sent to {$testTo}", "SUCCESS");
        } else {
            $message = "Failed to send sample email: " . htmlspecialchars($res['message']);
            $messageType = "danger";
            logSubscriptionMessage("Manual sample email failed: " . $res['message'], "ERROR");
        }
    }
}

// Fetch member audit statistics
$auditUsers = [];
$counts = [
    'total'        => 0,
    'lifetime'     => 0,
    'unknown'      => 0,
    'future'       => 0,
    'due_3_mo'     => 0,
    'due_1_mo'     => 0,
    'due_1_wk'     => 0,
    'due_1_day'    => 0,
    'due_today'    => 0,
    'due_exp_1wk'  => 0,
    'due_exp_1mo'  => 0,
    'due_exp_3mo'  => 0,
    'expired_past' => 0,
    'sent_cycle'   => 0
];

if ($conn) {
    $q = mysqli_query($conn, "SELECT id, user_id, fullname, email, lastpaid_date, membership_plan, membership_category FROM users ORDER BY id DESC LIMIT 200");
    $today = new DateTime('today');

    if ($q) {
        while ($u = mysqli_fetch_assoc($q)) {
            $counts['total']++;
            $calc = calculateUserSubscriptionExpiry($u);

            $u['calc_expiry'] = $calc['expiry_str'];
            $u['is_lifetime'] = $calc['is_lifetime'];
            $u['days_left'] = null;
            $u['stage'] = null;
            $u['already_sent'] = false;

            if ($calc['is_lifetime']) {
                $counts['lifetime']++;
            } elseif (!$calc['expiry_date']) {
                $counts['unknown']++;
            } else {
                $diff = $today->diff($calc['expiry_date']);
                $days = (int)$diff->format('%r%a');
                $u['days_left'] = $days;

                $stage = getApplicableMilestoneStage($days);
                $u['stage'] = $stage;

                if ($stage === '3_months') $counts['due_3_mo']++;
                elseif ($stage === '1_month') $counts['due_1_mo']++;
                elseif ($stage === '1_week') $counts['due_1_wk']++;
                elseif ($stage === '1_day') $counts['due_1_day']++;
                elseif ($stage === 'expired_today') $counts['due_today']++;
                elseif ($stage === 'expired_1_week') $counts['due_exp_1wk']++;
                elseif ($stage === 'expired_1_month') $counts['due_exp_1mo']++;
                elseif ($stage === 'expired_3_months') $counts['due_exp_3mo']++;
                elseif ($days > 90) $counts['future']++;
                elseif ($days < -90) $counts['expired_past']++;

                if ($stage) {
                    $membershipId = !empty($u['user_id']) ? $u['user_id'] : (string)$u['id'];
                    $u['already_sent'] = hasNotificationBeenSent($conn, $membershipId, $stage, $calc['expiry_str']);
                    if ($u['already_sent']) {
                        $counts['sent_cycle']++;
                    }
                }
            }

            $auditUsers[] = $u;
        }
    }
}

// Fetch recent sent notifications
$recentNotifications = [];
if ($conn) {
    $logQuery = mysqli_query($conn, "SELECT * FROM subscription_notifications ORDER BY id DESC LIMIT 50");
    if ($logQuery) {
        while ($row = mysqli_fetch_assoc($logQuery)) {
            $recentNotifications[] = $row;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ASSI Subscription Expiry Testing & Control Center</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      background-color: #f1f5f9;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
      color: #1e293b;
      padding-bottom: 60px;
    }
    .hero-header {
      background: linear-gradient(135deg, #1b56a5 0%, #0d3b75 100%);
      color: white;
      padding: 35px 0 25px;
      margin-bottom: 30px;
      border-bottom: 4px solid #f59e0b;
    }
    .card {
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.03);
      background: #ffffff;
      margin-bottom: 25px;
    }
    .card-header {
      background: #ffffff;
      border-bottom: 1px solid #e2e8f0;
      font-weight: 700;
      padding: 16px 20px;
      border-radius: 12px 12px 0 0 !important;
    }
    .badge-stage-3_months        { background-color: #fef3c7; color: #b45309; border: 1px solid #fde68a; }
    .badge-stage-1_month         { background-color: #ffedd5; color: #c2410c; border: 1px solid #fed7aa; }
    .badge-stage-1_week          { background-color: #fee2e2; color: #b91c1c; border: 1px solid #fecaca; }
    .badge-stage-1_day           { background-color: #7f1d1d; color: #ffffff; }
    .badge-stage-expired_today   { background-color: #991b1b; color: #ffffff; }
    .badge-stage-expired_1_week  { background-color: #ffedd5; color: #9a3412; border: 1px solid #fed7aa; font-weight: 600; }
    .badge-stage-expired_1_month { background-color: #fee2e2; color: #991b1b; border: 1px solid #fecaca; font-weight: 600; }
    .badge-stage-expired_3_months{ background-color: #450a0a; color: #ffffff; font-weight: 600; }
    .stat-box {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      padding: 18px 15px;
      text-align: center;
      transition: all 0.2s ease;
    }
    .stat-box:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    .stat-number {
      font-size: 26px;
      font-weight: 800;
    }
    .stat-label {
      font-size: 13px;
      color: #64748b;
      font-weight: 500;
    }
    .code-block {
      background: #0f172a;
      color: #38bdf8;
      padding: 12px 16px;
      border-radius: 8px;
      font-family: monospace;
      font-size: 13px;
      overflow-x: auto;
    }
    .status-pill {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 6px 14px;
      border-radius: 20px;
      font-size: 13px;
      font-weight: 600;
    }
  </style>
</head>
<body>

  <!-- Top Hero Header -->
  <div class="hero-header">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
          <h2 class="m-0 fw-bold"><i class="fa-solid fa-envelope-open-text me-2"></i> ASSI Subscription Expiry Alert System</h2>
          <p class="m-0 opacity-75 mt-1">Automated 3-Month, 1-Month, 1-Week, and 1-Day Membership Expiration Reminders</p>
        </div>
        <div>
          <?php if (SUBSCRIPTION_LIVE_MODE): ?>
            <span class="status-pill bg-danger text-white">
              <i class="fa-solid fa-circle-dot"></i> LIVE PRODUCTION MODE
            </span>
          <?php else: ?>
            <span class="status-pill bg-warning text-dark">
              <i class="fa-solid fa-shield-halved"></i> SAFE TEST MODE (LIVE_MODE = false)
            </span>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="container">

    <?php if ($message): ?>
      <div class="alert alert-<?php echo $messageType; ?> alert-dismissible fade show" role="alert">
        <i class="fa-solid <?php echo $messageType === 'success' ? 'fa-circle-check' : 'fa-triangle-exclamation'; ?> me-2"></i>
        <?php echo $message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <!-- Mode Banner -->
    <div class="card mb-4 border-warning bg-warning bg-opacity-10">
      <div class="card-body p-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
          <strong class="text-dark"><i class="fa-solid fa-info-circle text-warning me-2"></i> Safety Guarantee:</strong>
          <span class="text-secondary">System is currently configured in <strong>TEST / DRY-RUN mode</strong>. Real users will <u>NOT</u> receive any emails until you test and turn on <code>SUBSCRIPTION_LIVE_MODE</code>.</span>
        </div>
        <a href="#setup-guide" class="btn btn-sm btn-outline-dark fw-bold">How to make Live &rarr;</a>
      </div>
    </div>

    <!-- Quick Stats Grid -->
    <div class="row g-2 mb-4">
      <div class="col-md-3 col-6">
        <div class="stat-box">
          <div class="stat-label">Total Users</div>
          <div class="stat-number text-primary"><?php echo $counts['total']; ?></div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="stat-box">
          <div class="stat-label">Due (3 Mo / 1 Mo)</div>
          <div class="stat-number text-warning"><?php echo ($counts['due_3_mo'] + $counts['due_1_mo']); ?></div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="stat-box">
          <div class="stat-label">Due (1 Wk / 1 Day)</div>
          <div class="stat-number text-danger"><?php echo ($counts['due_1_wk'] + $counts['due_1_day']); ?></div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="stat-box">
          <div class="stat-label">Expires Today</div>
          <div class="stat-number text-danger fw-black"><?php echo $counts['due_today']; ?></div>
        </div>
      </div>
      <div class="col-md-4 col-6 mt-2">
        <div class="stat-box">
          <div class="stat-label">Expired 1 Wk (Grace)</div>
          <div class="stat-number" style="color: #c2410c;"><?php echo $counts['due_exp_1wk']; ?></div>
        </div>
      </div>
      <div class="col-md-4 col-6 mt-2">
        <div class="stat-box">
          <div class="stat-label">Expired 1 Mo (Suspended)</div>
          <div class="stat-number text-danger"><?php echo $counts['due_exp_1mo']; ?></div>
        </div>
      </div>
      <div class="col-md-4 col-12 mt-2">
        <div class="stat-box">
          <div class="stat-label">Expired 3 Mo (Inactive)</div>
          <div class="stat-number text-dark"><?php echo $counts['due_exp_3mo']; ?></div>
        </div>
      </div>
    </div>

    <!-- Two Columns: Test Mail Form & Quick Actions -->
    <div class="row">
      <!-- Send Sample Email Form -->
      <div class="col-lg-6">
        <div class="card h-100">
          <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fa-solid fa-paper-plane text-primary me-2"></i> Send Sample Email to My Inbox</span>
            <span class="badge bg-primary">Instant Preview</span>
          </div>
          <div class="card-body">
            <p class="text-muted small">Choose any of the 8 notification milestones and enter your personal email address to inspect the exact layout, colors, and content before real members ever see it.</p>
            
            <form action="" method="post">
              <div class="mb-3">
                <label class="form-label fw-bold">Select Reminder Stage:</label>
                <select name="stage" class="form-select" required>
                  <optgroup label="⚠️ Pre-Expiry Reminders">
                    <option value="3_months">🟡 3 Months Before Expiry (90 Days)</option>
                    <option value="1_month">🟠 1 Month Before Expiry (30 Days)</option>
                    <option value="1_week">🔴 1 Week Before Expiry (7 Days - Urgent)</option>
                    <option value="1_day">🚨 1 Day Before Expiry (Final 24 Hours Notice)</option>
                  </optgroup>
                  <optgroup label="🚨 Expired Milestones (Requested)">
                    <option value="expired_today" selected>⏰ On Expiration Date (Expires Today)</option>
                    <option value="expired_1_week">⚠️ 1 Week After Expired (Grace Period)</option>
                    <option value="expired_1_month">⛔ 1 Month After Expired (Suspended)</option>
                    <option value="expired_3_months">🛑 3 Months After Expired (Final Deactivation)</option>
                  </optgroup>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label fw-bold">Your Email Address (Recipient):</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                  <input type="email" name="test_email" class="form-control" placeholder="arunduraideveloper@gmail.com" value="<?php echo htmlspecialchars(DEFAULT_TEST_EMAIL); ?>" required>
                </div>
                <div class="form-text">The email will be sent ONLY to this address for testing.</div>
              </div>

              <div class="row g-2 mb-3">
                <div class="col-md-6">
                  <label class="form-label small fw-semibold">Sample Member Name:</label>
                  <input type="text" name="sample_name" class="form-control form-control-sm" value="Dr. Arun Kumar">
                </div>
                <div class="col-md-6">
                  <label class="form-label small fw-semibold">Sample User ID:</label>
                  <input type="text" name="sample_id" class="form-control form-control-sm" value="ASSI-LM-1042">
                </div>
              </div>

              <button type="submit" name="send_sample_email" class="btn btn-primary w-100 py-2 fw-bold">
                <i class="fa-solid fa-paper-plane me-2"></i> Send Sample Email Now
              </button>
            </form>
          </div>
        </div>
      </div>

      <!-- Runner Triggers & Quick Actions -->
      <div class="col-lg-6">
        <div class="card h-100">
          <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fa-solid fa-bolt text-warning me-2"></i> Automated Runner Controls</span>
            <span class="badge bg-secondary">Automation</span>
          </div>
          <div class="card-body">
            <p class="text-muted small">Execute the reminder script right now to preview or test with the database:</p>

            <div class="d-grid gap-2 mb-3">
              <a href="send_expiry_reminders.php?token=<?php echo CRON_SECURITY_TOKEN; ?>&mode=dry_run" target="_blank" class="btn btn-outline-primary py-2 text-start">
                <i class="fa-solid fa-magnifying-glass me-2"></i>
                <strong>Run Dry-Run (Preview Database)</strong>
                <div class="small text-muted ms-4">Scans all members and displays who is eligible without sending any mail.</div>
              </a>

              <a href="send_expiry_reminders.php?token=<?php echo CRON_SECURITY_TOKEN; ?>&mode=test&test_email=<?php echo urlencode(DEFAULT_TEST_EMAIL); ?>" target="_blank" class="btn btn-outline-warning text-dark py-2 text-start">
                <i class="fa-solid fa-vial me-2"></i>
                <strong>Run Batch Test (Send to <?php echo DEFAULT_TEST_EMAIL; ?>)</strong>
                <div class="small text-muted ms-4">Processes eligible members but redirects all emails to your test inbox.</div>
              </a>
            </div>

            <div class="alert alert-light border small mb-0">
              <strong><i class="fa-solid fa-server me-1"></i> Current SMTP Server:</strong><br>
              <code><?php echo SMTP_HOST . ':' . SMTP_PORT; ?> (User: <?php echo SMTP_USER; ?>)</code>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Member Expiry Database Audit Table -->
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fa-solid fa-users text-primary me-2"></i> Members Expiry Analysis (Database Preview)</span>
        <span class="badge bg-light text-dark border">Showing recent <?php echo count($auditUsers); ?> members</span>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
          <table class="table table-hover table-striped align-middle mb-0" style="font-size: 13px;">
            <thead class="table-dark sticky-top">
              <tr>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Plan</th>
                <th>Start Date</th>
                <th>Calculated Expiry</th>
                <th>Days Left</th>
                <th>Notification Stage</th>
                <th>Cycle Status</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($auditUsers)): ?>
                <?php foreach ($auditUsers as $u): ?>
                  <tr>
                    <td><code><?php echo htmlspecialchars($u['user_id'] ?: $u['id']); ?></code></td>
                    <td class="fw-semibold"><?php echo htmlspecialchars($u['fullname']); ?></td>
                    <td><?php echo htmlspecialchars($u['email']); ?></td>
                    <td><?php echo htmlspecialchars($u['membership_plan'] ?: '1 Year'); ?></td>
                    <td><?php echo htmlspecialchars($u['lastpaid_date'] ?: '-'); ?></td>
                    <td>
                      <?php if ($u['is_lifetime']): ?>
                        <span class="badge bg-secondary">Life Member</span>
                      <?php else: ?>
                        <strong><?php echo htmlspecialchars($u['calc_expiry']); ?></strong>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if ($u['days_left'] !== null): ?>
                        <span class="badge <?php echo $u['days_left'] <= 7 ? 'bg-danger' : ($u['days_left'] <= 30 ? 'bg-warning text-dark' : 'bg-info text-dark'); ?>">
                          <?php echo $u['days_left']; ?> days
                        </span>
                      <?php else: ?>
                        -
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if ($u['stage']): ?>
                        <?php if ($u['stage'] === 'Expired'): ?>
                          <span class="badge bg-secondary">Expired</span>
                        <?php else: ?>
                          <span class="badge badge-stage-<?php echo $u['stage']; ?> px-2 py-1">
                            <?php echo $u['stage']; ?>
                          </span>
                        <?php endif; ?>
                      <?php else: ?>
                        <span class="text-muted small">Not in window</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if ($u['already_sent']): ?>
                        <span class="badge bg-success"><i class="fa-solid fa-check"></i> Already Sent</span>
                      <?php elseif ($u['stage'] && $u['stage'] !== 'Expired'): ?>
                        <span class="badge bg-primary">Due for Alert</span>
                      <?php else: ?>
                        <span class="text-muted">-</span>
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="9" class="text-center p-4 text-muted">No member records found.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Notification Log History -->
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fa-solid fa-clock-rotate-left text-primary me-2"></i> Sent Notification History (Audit Log)</span>
        <span class="badge bg-secondary"><?php echo count($recentNotifications); ?> entries</span>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
          <table class="table table-hover align-middle mb-0" style="font-size: 13px;">
            <thead class="table-light sticky-top">
              <tr>
                <th>ID</th>
                <th>Recipient</th>
                <th>Stage</th>
                <th>Expiry Date</th>
                <th>Days Rem.</th>
                <th>Mode</th>
                <th>Status</th>
                <th>Timestamp</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($recentNotifications)): ?>
                <?php foreach ($recentNotifications as $log): ?>
                  <tr>
                    <td>#<?php echo $log['id']; ?></td>
                    <td>
                      <strong><?php echo htmlspecialchars($log['recipient_name']); ?></strong><br>
                      <small class="text-muted"><?php echo htmlspecialchars($log['recipient_email']); ?></small>
                    </td>
                    <td><span class="badge badge-stage-<?php echo $log['notification_stage']; ?>"><?php echo $log['notification_stage']; ?></span></td>
                    <td><?php echo htmlspecialchars($log['expiry_date']); ?></td>
                    <td><?php echo $log['days_remaining']; ?>d</td>
                    <td><span class="badge bg-dark"><?php echo $log['mode']; ?></span></td>
                    <td>
                      <?php if ($log['status'] === 'SENT'): ?>
                        <span class="badge bg-success">SENT</span>
                      <?php elseif ($log['status'] === 'TEST_SENT'): ?>
                        <span class="badge bg-warning text-dark">TEST_SENT</span>
                      <?php elseif ($log['status'] === 'DRY_RUN'): ?>
                        <span class="badge bg-info text-dark">DRY_RUN</span>
                      <?php else: ?>
                        <span class="badge bg-danger"><?php echo htmlspecialchars($log['status']); ?></span>
                      <?php endif; ?>
                    </td>
                    <td class="text-muted"><?php echo htmlspecialchars($log['sent_at']); ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="8" class="text-center p-4 text-muted">No notification logs recorded yet. Run a dry run or send a sample email to see history here.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Setup & Automation Guide Card -->
    <div class="card" id="setup-guide">
      <div class="card-header bg-dark text-white">
        <i class="fa-solid fa-terminal me-2"></i> Automation Setup & Live Deployment Guide
      </div>
      <div class="card-body">
        <h5>1. How to Test First (What to do now):</h5>
        <ol class="mb-4">
          <li>Use the <strong>"Send Sample Email to My Inbox"</strong> form above to send all 4 notification emails to yourself.</li>
          <li>Check your inbox and verify the subject, ASSI styling, buttons, and details.</li>
          <li>Click <strong>"Run Dry-Run"</strong> to see all members in your database who are nearing their expiration date.</li>
        </ol>

        <h5>2. How to Automate Daily (Choose either Method A, B, or C):</h5>
        
        <h6 class="text-primary mt-3"><i class="fa-brands fa-windows me-1"></i> Method A: Windows Task Scheduler (Local / Windows Server)</h6>
        <p class="small text-muted mb-1">Create a daily task in Windows Task Scheduler to run at 9:00 AM:</p>
        <div class="code-block mb-3">
php.exe "C:\xampp\htdocs\assi\cron\send_expiry_reminders.php"
        </div>
        <p class="small text-muted">A ready-to-run batch file has also been generated for you at: <code>cron/run_cron_windows.bat</code></p>

        <h6 class="text-primary mt-3"><i class="fa-brands fa-linux me-1"></i> Method B: Linux / cPanel Cron Job (Production Server)</h6>
        <p class="small text-muted mb-1">In your cPanel -> <strong>Cron Jobs</strong>, set to run once daily at 9:00 AM (<code>0 9 * * *</code>):</p>
        <div class="code-block mb-3">
/usr/local/bin/php /home/username/public_html/cron/send_expiry_reminders.php >/dev/null 2>&1
        </div>

        <h6 class="text-primary mt-3"><i class="fa-solid fa-globe me-1"></i> Method C: Web Cron / EasyCron / cron-job.org</h6>
        <p class="small text-muted mb-1">If you prefer an external free cron service (e.g. cron-job.org), configure it to trigger daily at this secured URL:</p>
        <div class="code-block mb-4">
https://www.assi.in/cron/send_expiry_reminders.php?token=<?php echo CRON_SECURITY_TOKEN; ?>&mode=live
        </div>

        <h5>3. How to Make it LIVE (When Ready):</h5>
        <p class="mb-2">Open <a href="file:///c:/xampp/htdocs/assi/cron/subscription_mail_config.php">subscription_mail_config.php</a> and change line 25:</p>
        <div class="code-block mb-3">
// Change from:
define('SUBSCRIPTION_LIVE_MODE', false);

// To:
define('SUBSCRIPTION_LIVE_MODE', true);
        </div>
        <p class="text-muted small">Once set to <code>true</code>, the scheduled automation will send real emails directly to members when they enter each expiration window.</p>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
