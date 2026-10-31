<?php
/**
 * Database User & Expiry Date Analyzer
 */
require_once dirname(__DIR__) . '/config.php';
require_once __DIR__ . '/subscription_helper.php';

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// 1. Get Table Structure of `users`
$colsResult = mysqli_query($conn, "DESCRIBE users");
$columns = [];
while ($col = mysqli_fetch_assoc($colsResult)) {
    $columns[] = $col['Field'];
}

// 2. Count Total Users
$totalRes = mysqli_query($conn, "SELECT COUNT(*) as total FROM users");
$totalUsers = mysqli_fetch_assoc($totalRes)['total'];

// 3. Check for specific columns
$hasExpiryCol = in_array('expiry_date', $columns);
$hasValidUptoCol = in_array('valid_upto', $columns);
$hasLastpaidCol = in_array('lastpaid_date', $columns);
$hasPlanCol = in_array('membership_plan', $columns);
$hasCatCol = in_array('membership_category', $columns);

// 4. Fetch all users to do a comprehensive audit
$usersQuery = mysqli_query($conn, "SELECT * FROM users");

$stats = [
    'total_users'             => $totalUsers,
    'has_email'               => 0,
    'no_email'                => 0,
    'has_lastpaid_date'       => 0,
    'empty_lastpaid_date'     => 0,
    'has_membership_plan'     => 0,
    'empty_membership_plan'   => 0,
    'membership_categories'   => [],
    'membership_plans'        => [],
    'has_calculable_expiry'   => 0,
    'life_members'            => 0,
    'cannot_calculate_expiry' => 0,
    'sample_missing'          => [],
    'sample_valid'            => []
];

$today = new DateTime('today');
$expiryStatus = [
    'already_expired' => 0,
    'due_within_90d'  => 0,
    'active_future'   => 0
];

while ($row = mysqli_fetch_assoc($usersQuery)) {
    $email = trim($row['email'] ?? '');
    if (!empty($email)) {
        $stats['has_email']++;
    } else {
        $stats['no_email']++;
    }

    $lastpaid = trim($row['lastpaid_date'] ?? '');
    if (!empty($lastpaid)) {
        $stats['has_lastpaid_date']++;
    } else {
        $stats['empty_lastpaid_date']++;
    }

    $plan = trim($row['membership_plan'] ?? '');
    if (!empty($plan)) {
        $stats['has_membership_plan']++;
        $stats['membership_plans'][$plan] = ($stats['membership_plans'][$plan] ?? 0) + 1;
    } else {
        $stats['empty_membership_plan']++;
    }

    $cat = strtoupper(trim($row['membership_category'] ?? ''));
    if (!empty($cat)) {
        $stats['membership_categories'][$cat] = ($stats['membership_categories'][$cat] ?? 0) + 1;
    } else {
        $stats['membership_categories']['(EMPTY)'] = ($stats['membership_categories']['(EMPTY)'] ?? 0) + 1;
    }

    // Run expiration calculation
    $calc = calculateUserSubscriptionExpiry($row);

    if ($calc['is_lifetime']) {
        $stats['life_members']++;
    } elseif ($calc['expiry_date']) {
        $stats['has_calculable_expiry']++;
        $diff = $today->diff($calc['expiry_date']);
        $days = (int)$diff->format('%r%a');

        if ($days < 0) {
            $expiryStatus['already_expired']++;
        } elseif ($days <= 90) {
            $expiryStatus['due_within_90d']++;
        } else {
            $expiryStatus['active_future']++;
        }

        if (count($stats['sample_valid']) < 5) {
            $stats['sample_valid'][] = [
                'id'       => $row['user_id'] ?? $row['id'],
                'name'     => $row['fullname'] ?? '',
                'category' => $cat,
                'plan'     => $plan,
                'lastpaid' => $lastpaid,
                'expiry'   => $calc['expiry_str']
            ];
        }
    } else {
        $stats['cannot_calculate_expiry']++;
        if (count($stats['sample_missing']) < 5) {
            $stats['sample_missing'][] = [
                'id'       => $row['user_id'] ?? $row['id'],
                'name'     => $row['fullname'] ?? '',
                'category' => $cat,
                'plan'     => $plan,
                'lastpaid' => $lastpaid,
                'reason'   => $calc['reason']
            ];
        }
    }
}

echo json_encode([
    'columns'         => $columns,
    'total_users'     => $totalUsers,
    'has_expiry_col'  => $hasExpiryCol,
    'stats'           => $stats,
    'expiry_status'   => $expiryStatus
], JSON_PRETTY_PRINT);
