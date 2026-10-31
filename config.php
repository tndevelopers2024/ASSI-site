<?php
session_start();

// Database connection
// $conn = mysqli_connect('localhost', 'u448399733_users', 'Assi@#2k24', 'u448399733_assi_new');
$conn = mysqli_connect('localhost', 'root', '', 'assi', 3307);


// Check if connection was successful
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// Start the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check for the persistent cookie
if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_token'])) {
    $token = mysqli_real_escape_string($conn, $_COOKIE['user_token']);
    $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE token = '$token'");

    if ($select_user && mysqli_num_rows($select_user) > 0) {
        $user_row = mysqli_fetch_assoc($select_user);
        $_SESSION['user_id'] = $user_row['id'];
    }
}
?>
