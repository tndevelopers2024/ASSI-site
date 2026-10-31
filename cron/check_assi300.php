<?php
require_once dirname(__DIR__) . '/config.php';

$res = mysqli_query($conn, "SELECT id, user_id, fullname, email, membership_category, membership_plan, lastpaid_date FROM users WHERE user_id LIKE 'ASSI300%' ORDER BY user_id ASC");
echo "Count: " . mysqli_num_rows($res) . "\n";
while ($r = mysqli_fetch_assoc($res)) {
    echo $r['user_id'] . " | " . $r['fullname'] . " | plan: " . $r['membership_plan'] . " | lastpaid: " . ($r['lastpaid_date'] ?: 'NULL') . "\n";
}
