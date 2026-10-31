<?php
/**
 * ASSI Subscription Helper Functions
 * 
 * Location: /cron/subscription_helper.php
 */

require_once __DIR__ . '/subscription_mail_config.php';

/**
 * Ensures the subscription_notifications tracking table exists.
 *
 * @param mysqli $conn
 * @return bool
 */
function ensureNotificationTableExists($conn) {
    if (!$conn) {
        return false;
    }

    $sql = "CREATE TABLE IF NOT EXISTS `subscription_notifications` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `user_db_id` INT NULL,
        `membership_user_id` VARCHAR(100) NULL,
        `recipient_email` VARCHAR(255) NOT NULL,
        `recipient_name` VARCHAR(255) NULL,
        `notification_stage` VARCHAR(50) NOT NULL,
        `expiry_date` DATE NOT NULL,
        `days_remaining` INT NOT NULL DEFAULT 0,
        `status` VARCHAR(50) NOT NULL DEFAULT 'SENT',
        `mode` VARCHAR(20) NOT NULL DEFAULT 'LIVE',
        `error_message` TEXT NULL,
        `sent_at` DATETIME NOT NULL,
        UNIQUE KEY `uniq_sub_stage_cycle` (`membership_user_id`, `notification_stage`, `expiry_date`),
        INDEX `idx_user_id` (`membership_user_id`),
        INDEX `idx_expiry` (`expiry_date`),
        INDEX `idx_stage` (`notification_stage`),
        INDEX `idx_sent_at` (`sent_at`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    return (bool) mysqli_query($conn, $sql);
}

/**
 * Parses a date string in various possible formats (YYYY-MM-DD, DD-MM-YYYY, DD/MM/YYYY, etc.)
 *
 * @param string $rawDate
 * @return DateTime|null
 */
function parseSubscriptionDate($rawDate) {
    if (empty($rawDate)) {
        return null;
    }

    $clean = trim($rawDate);
    // Take date portion if time is attached
    $parts = explode(' ', $clean);
    $datePart = $parts[0];

    // Standard YYYY-MM-DD
    if (preg_match('/^(\d{4})-(\d{1,2})-(\d{1,2})$/', $datePart, $m)) {
        if (checkdate((int)$m[2], (int)$m[3], (int)$m[1])) {
            $dt = new DateTime();
            $dt->setDate((int)$m[1], (int)$m[2], (int)$m[3]);
            $dt->setTime(0, 0, 0);
            return $dt;
        }
    }

    // DD-MM-YYYY
    if (preg_match('/^(\d{1,2})-(\d{1,2})-(\d{4})$/', $datePart, $m)) {
        if (checkdate((int)$m[2], (int)$m[1], (int)$m[3])) {
            $dt = new DateTime();
            $dt->setDate((int)$m[3], (int)$m[2], (int)$m[1]);
            $dt->setTime(0, 0, 0);
            return $dt;
        }
    }

    // DD/MM/YYYY
    if (preg_match('/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/', $datePart, $m)) {
        if (checkdate((int)$m[2], (int)$m[1], (int)$m[3])) {
            $dt = new DateTime();
            $dt->setDate((int)$m[3], (int)$m[2], (int)$m[1]);
            $dt->setTime(0, 0, 0);
            return $dt;
        }
    }

    // General strtotime fallback
    $ts = strtotime($clean);
    if ($ts !== false && $ts > 0) {
        $dt = new DateTime();
        $dt->setTimestamp($ts);
        $dt->setTime(0, 0, 0);
        return $dt;
    }

    return null;
}

/**
 * Calculates validity period in years from membership_plan string.
 *
 * @param string $membershipPlan
 * @return int
 */
function getPlanValidityYears($membershipPlan) {
    $plan = trim((string)$membershipPlan);
    if (stripos($plan, '5 Year') !== false) {
        return 5;
    }
    if (stripos($plan, '3 Year') !== false) {
        return 3;
    }
    if (stripos($plan, '2 Year') !== false || stripos($plan, 'Applicant') !== false) {
        return 2;
    }
    if (stripos($plan, '1 Year') !== false) {
        return 1;
    }

    // Extract first digit if exists
    if (preg_match('/(\d+)/', $plan, $matches)) {
        $num = (int)$matches[1];
        if ($num > 0 && $num <= 10) {
            return $num;
        }
    }

    return 1; // Default 1 year
}

/**
 * Computes the subscription expiration date for a user record.
 * Mirrors the logic used in dashboard.php.
 *
 * @param array $user
 * @return array ['expiry_date' => DateTime|null, 'expiry_str' => string, 'is_lifetime' => bool, 'reason' => string]
 */
function calculateUserSubscriptionExpiry(array $user) {
    $category = strtoupper(trim($user['membership_category'] ?? ''));
    $plan = trim($user['membership_plan'] ?? '');
    $lastpaid = trim($user['lastpaid_date'] ?? '');
    $explicitExpiry = trim($user['expiry_date'] ?? ($user['valid_upto'] ?? ''));

    // Check if an explicit expiry date is already stored in database
    if (!empty($explicitExpiry)) {
        $parsedExpiry = parseSubscriptionDate($explicitExpiry);
        if ($parsedExpiry) {
            return [
                'expiry_date' => $parsedExpiry,
                'expiry_str'  => $parsedExpiry->format('Y-m-d'),
                'is_lifetime' => false,
                'reason'      => 'From explicit database expiry column'
            ];
        }
    }

    // Check for Life Membership (Never Expires)
    if ($category === 'LIFE' || stripos($plan, 'Life') !== false || strtolower($lastpaid) === 'life time') {
        return [
            'expiry_date' => null,
            'expiry_str'  => 'LIFETIME',
            'is_lifetime' => true,
            'reason'      => 'Life Membership (Never Expires)'
        ];
    }

    // If start/lastpaid date is missing
    if (empty($lastpaid)) {
        return [
            'expiry_date' => null,
            'expiry_str'  => 'UNKNOWN',
            'is_lifetime' => false,
            'reason'      => 'Start date (lastpaid_date) is missing'
        ];
    }

    $startDate = parseSubscriptionDate($lastpaid);
    if (!$startDate) {
        return [
            'expiry_date' => null,
            'expiry_str'  => 'INVALID_DATE',
            'is_lifetime' => false,
            'reason'      => 'Could not parse lastpaid_date: ' . $lastpaid
        ];
    }

    $validityYears = getPlanValidityYears($plan);
    $expiryDate = clone $startDate;
    $expiryDate->modify("+{$validityYears} year");

    return [
        'expiry_date' => $expiryDate,
        'expiry_str'  => $expiryDate->format('Y-m-d'),
        'is_lifetime' => false,
        'reason'      => "Calculated from {$startDate->format('Y-m-d')} + {$validityYears} Year(s)"
    ];
}

/**
 * Determines which reminder stage applies for the given days remaining.
 * Covers:
 *  - BEFORE Expiry: 3 months, 1 month, 1 week, 1 day
 *  - ON Expiry Date: Expiring today (0 days)
 *  - AFTER Expiry: 1 week after, 1 month after, 3 months after (if unrenewed)
 *
 * @param int $daysRemaining (expiryDate - today in days)
 * @return string|null
 */
function getApplicableMilestoneStage($daysRemaining) {
    global $notificationStages;

    // === BEFORE EXPIRY ===
    // 3 Months Before (31 to 90 days)
    if ($daysRemaining >= 31 && $daysRemaining <= 90) {
        return '3_months';
    }

    // 1 Month Before (8 to 30 days)
    if ($daysRemaining >= 8 && $daysRemaining <= 30) {
        return '1_month';
    }

    // 1 Week Before (2 to 7 days)
    if ($daysRemaining >= 2 && $daysRemaining <= 7) {
        return '1_week';
    }

    // 1 Day Before (1 day)
    if ($daysRemaining === 1) {
        return '1_day';
    }

    // === ON EXPIRATION DATE ===
    // Expires Today (0 days)
    if ($daysRemaining === 0) {
        return 'expired_today';
    }

    // === AFTER EXPIRY (UNRENEWED GRACE PERIOD) ===
    // 1 Week After Expiry (-1 to -7 days)
    if ($daysRemaining >= -7 && $daysRemaining <= -1) {
        return 'expired_1_week';
    }

    // 1 Month After Expiry (-8 to -30 days)
    if ($daysRemaining >= -30 && $daysRemaining <= -8) {
        return 'expired_1_month';
    }

    // 3 Months After Expiry (-31 to -90 days)
    if ($daysRemaining >= -90 && $daysRemaining <= -31) {
        return 'expired_3_months';
    }

    return null;
}

/**
 * Checks whether a notification has already been sent for this cycle.
 *
 * @param mysqli $conn
 * @param string $membershipUserId
 * @param string $stage
 * @param string $expiryDateStr (YYYY-MM-DD)
 * @return bool
 */
function hasNotificationBeenSent($conn, $membershipUserId, $stage, $expiryDateStr) {
    if (!$conn) {
        return false;
    }

    $safeUser = mysqli_real_escape_string($conn, $membershipUserId);
    $safeStage = mysqli_real_escape_string($conn, $stage);
    $safeExpiry = mysqli_real_escape_string($conn, $expiryDateStr);

    $sql = "SELECT id FROM subscription_notifications 
            WHERE membership_user_id = '$safeUser' 
              AND notification_stage = '$safeStage' 
              AND expiry_date = '$safeExpiry' 
              AND status IN ('SENT', 'TEST_SENT') 
            LIMIT 1";

    $res = mysqli_query($conn, $sql);
    return ($res && mysqli_num_rows($res) > 0);
}

/**
 * Records that a notification was sent or dry-run logged.
 *
 * @param mysqli $conn
 * @param array $data
 * @return bool
 */
function recordNotificationSent($conn, array $data) {
    if (!$conn) {
        return false;
    }

    $userDbId   = !empty($data['user_db_id']) ? (int)$data['user_db_id'] : 'NULL';
    $userId     = mysqli_real_escape_string($conn, $data['membership_user_id'] ?? '');
    $email      = mysqli_real_escape_string($conn, $data['recipient_email'] ?? '');
    $name       = mysqli_real_escape_string($conn, $data['recipient_name'] ?? '');
    $stage      = mysqli_real_escape_string($conn, $data['notification_stage'] ?? '');
    $expiry     = mysqli_real_escape_string($conn, $data['expiry_date'] ?? '');
    $days       = (int)($data['days_remaining'] ?? 0);
    $status     = mysqli_real_escape_string($conn, $data['status'] ?? 'SENT');
    $mode       = mysqli_real_escape_string($conn, $data['mode'] ?? 'LIVE');
    $errMsg     = !empty($data['error_message']) ? "'" . mysqli_real_escape_string($conn, $data['error_message']) . "'" : 'NULL';

    $sql = "INSERT INTO subscription_notifications 
            (user_db_id, membership_user_id, recipient_email, recipient_name, notification_stage, expiry_date, days_remaining, status, mode, error_message, sent_at)
            VALUES 
            ($userDbId, '$userId', '$email', '$name', '$stage', '$expiry', $days, '$status', '$mode', $errMsg, NOW())
            ON DUPLICATE KEY UPDATE 
                status = VALUES(status), 
                sent_at = NOW(), 
                days_remaining = VALUES(days_remaining),
                error_message = VALUES(error_message)";

    return (bool) mysqli_query($conn, $sql);
}

/**
 * Appends a message to the subscription mailer log file.
 *
 * @param string $message
 * @param string $level INFO|WARNING|ERROR|SUCCESS
 */
function logSubscriptionMessage($message, $level = 'INFO') {
    $time = date('Y-m-d H:i:s');
    $formatted = "[{$time}] [{$level}] {$message}\n";
    @file_put_contents(SUBSCRIPTION_LOG_FILE, $formatted, FILE_APPEND);
}
