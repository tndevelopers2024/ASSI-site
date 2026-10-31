<?php
/**
 * Test Dispatcher Script
 * Sends the 4 subscription expiry milestone sample emails to madhavangl20@gmail.com
 *
 * Location: /cron/send_test_to_user.php
 */

require_once __DIR__ . '/subscription_mail_config.php';
require_once __DIR__ . '/subscription_helper.php';
require_once __DIR__ . '/email_templates.php';
require_once __DIR__ . '/mailer_service.php';

$recipientEmail = 'madhavangl20@gmail.com';
$recipientName = 'Dr Sahil Mhaisane';

echo "=========================================================\n";
echo "Sending ASSI Subscription Expiry Test Emails\n";
echo "Recipient: $recipientEmail\n";
echo "Member: Dr Sahil Mhaisane (ASSI30091)\n";
echo "Registered Email: drsahilknows@gmail.com | Phone: 7977132536\n";
echo "Plan: Applicant member\n";
echo "SMTP Host: " . SMTP_HOST . ":" . SMTP_PORT . " (" . SMTP_USER . ")\n";
echo "=========================================================\n\n";

$stages = [
    '3_months' => [
        'days'        => 90,
        'title'       => '3 Months Before Expiry'
    ],
    '1_month' => [
        'days'        => 30,
        'title'       => '1 Month Before Expiry'
    ],
    '1_week' => [
        'days'        => 7,
        'title'       => '1 Week Before Expiry (Urgent)'
    ],
    '1_day' => [
        'days'        => 1,
        'title'       => '1 Day Before Expiry (Final Notice)'
    ],
    'expired_today' => [
        'days'        => 0,
        'title'       => 'On Expiration Date (Expires Today)'
    ],
    'expired_1_week' => [
        'days'        => -7,
        'title'       => '1 Week After Expired (Grace Period Notice)'
    ],
    'expired_1_month' => [
        'days'        => -30,
        'title'       => '1 Month After Expired (Suspension Notice)'
    ],
    'expired_3_months' => [
        'days'        => -90,
        'title'       => '3 Months After Expired (Final Deactivation Notice)'
    ]
];

$results = [];

$sampleUser = [
    'fullname'            => 'Dr Sahil Mhaisane',
    'user_id'             => 'ASSI30091',
    'phonenumber'         => '7977132536',
    'email'               => 'drsahilknows@gmail.com',
    'membership_category' => 'Applicant member',
    'membership_plan'     => 'Applicant member'
];

foreach ($stages as $stageKey => $config) {
    echo "Processing Stage: {$config['title']}... ";

    $expiryDate = new DateTime();
    if ($config['days'] >= 0) {
        $expiryDate->modify("+{$config['days']} days");
    } else {
        $absDays = abs($config['days']);
        $expiryDate->modify("-{$absDays} days");
    }
    $expiryFormatted = $expiryDate->format('d F Y');

    $emailData = buildSubscriptionExpiryEmail($sampleUser, $stageKey, $expiryFormatted, $config['days']);
    $subject = $emailData['subject'];

    $sendResult = sendSubscriptionMail($recipientEmail, $recipientName, $subject, $emailData['html'], $emailData['text'], false);

    if ($sendResult['success']) {
        echo "SUCCESS\n";
        $results[$stageKey] = ['status' => 'SUCCESS', 'message' => 'Sent'];
        logSubscriptionMessage("Test email [{$stageKey}] for Dr Sahil Mhaisane sent to {$recipientEmail}", 'SUCCESS');
    } else {
        echo "FAILED\n";
        echo "  Error: " . $sendResult['message'] . "\n";
        $results[$stageKey] = ['status' => 'FAILED', 'message' => $sendResult['message']];
        logSubscriptionMessage("Test email [{$stageKey}] for Dr Sahil Mhaisane to {$recipientEmail} failed: " . $sendResult['message'], 'ERROR');
    }

    // Small delay between sends to respect rate limits
    sleep(1);
}

echo "\n=========================================================\n";
echo "Summary of Dispatch:\n";
foreach ($results as $stageKey => $res) {
    echo sprintf(" - %-10s : %s\n", $stageKey, $res['status']);
}
echo "=========================================================\n";
