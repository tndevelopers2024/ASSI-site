<?php
require_once dirname(__DIR__) . '/config.php';
require_once __DIR__ . '/subscription_helper.php';

$sql = "SELECT * FROM users WHERE TRIM(user_id) = 'ASSI30062' OR user_id LIKE '%30062%'";
$res = mysqli_query($conn, $sql);

if (!$res || mysqli_num_rows($res) === 0) {
    echo "STILL_NOT_FOUND\n";
    // Check recently added users (highest id)
    $latest = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC LIMIT 5");
    echo "Latest 5 records in users table:\n";
    while ($row = mysqli_fetch_assoc($latest)) {
        echo json_encode($row, JSON_PRETTY_PRINT) . "\n";
    }
} else {
    while ($user = mysqli_fetch_assoc($res)) {
        echo "=== FOUND USER RECORD ===\n";
        echo json_encode($user, JSON_PRETTY_PRINT) . "\n\n";

        $calc = calculateUserSubscriptionExpiry($user);
        echo "=== EXPIRY DETAILS ===\n";
        echo json_encode($calc, JSON_PRETTY_PRINT) . "\n\n";

        if ($calc['expiry_date']) {
            $today = new DateTime('today');
            $diff = $today->diff($calc['expiry_date']);
            $days = (int)$diff->format('%r%a');
            echo "Today's Date: " . $today->format('Y-m-d') . "\n";
            echo "Calculated Expiration Date: " . $calc['expiry_date']->format('d F Y') . " (" . $calc['expiry_date']->format('Y-m-d') . ")\n";
            echo "Days Remaining: " . $days . " days\n";
            echo "Milestone Notification Stage: " . (getApplicableMilestoneStage($days) ?? 'None (Outside 90-day alert window)') . "\n";
        }
    }
}
