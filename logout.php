<?php
session_start();
session_unset();
session_destroy();

if (isset($_COOKIE['user_token'])) {
  setcookie("user_token", "", time() - 3600, "/"); // Unset the cookie
}

header('location: index.php');
exit();
?>
