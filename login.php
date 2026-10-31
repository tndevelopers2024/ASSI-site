<?php
include 'config.php';
session_start(); // Ensure session is started

// Error logging function
function log_error($message) {
    error_log("[" . date("Y-m-d H:i:s") . "] " . $message . "\n", 3, "error_log.txt");
}

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (isset($_POST['submit'])) {
            require_login($conn);
        } elseif (isset($_POST['forget_password'])) {
            handle_forgot_password($conn);
        }
    } catch (Exception $e) {
        log_error("Exception: " . $e->getMessage());
        show_error_message("Something went wrong. Please try again later.");
    }
}

// Function to handle user login
function require_login($conn) {
    if (!isset($_POST['identifier']) || !isset($_POST['password'])) {
        show_error_message("User ID, email, and password are required!");
        return;
    }

    $identifier = trim($_POST['identifier']);
    $password = $_POST['password'];

    if (empty($identifier) || empty($password)) {
        show_error_message("User ID, email, and password are required!");
        return;
    }

    // Secure prepared statement
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE TRIM(user_id) = ? OR TRIM(email) = ?");
    $stmt->bind_param("ss", $identifier, $identifier);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        throw new Exception("Database query failed: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $user_row = $result->fetch_assoc();
        $stored_password = $user_row['password'];

        // Direct password comparison (Since passwords are NOT hashed)
        if ($password === $stored_password) {
            $_SESSION['user_id'] = $user_row['id'];

            // Create a unique session token
            $token = bin2hex(random_bytes(16));
            $expire = time() + (86400 * 30); // 30 days

            // Secure token update
            $update_stmt = $conn->prepare("UPDATE users SET token = ? WHERE id = ?");
            $update_stmt->bind_param("si", $token, $user_row['id']);
            $update_success = $update_stmt->execute();

            if (!$update_success) {
                throw new Exception("Failed to update user token: " . $conn->error);
            }

            // Set the cookie securely
            setcookie("user_token", $token, $expire, "/", "", true, true);

            header('Location: dashboard.php');
            exit();
        } else {
            show_error_message("Incorrect password! Please try again.");
        }
    } else {
        show_error_message("User ID or Email not found!");
    }
}

// Function to handle forgot password
function handle_forgot_password($conn) {
    if (!isset($_POST['identifier'])) {
        show_error_message("Please enter your User ID or Email.");
        return;
    }

    $identifier = trim($_POST['identifier']);

    if (empty($identifier)) {
        show_error_message("Please enter your User ID or Email.");
        return;
    }

    // Secure prepared statement
    $stmt = $conn->prepare("SELECT id FROM users WHERE TRIM(user_id) = ? OR TRIM(email) = ?");
    $stmt->bind_param("ss", $identifier, $identifier);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        throw new Exception("Database query failed: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $_SESSION['identifier'] = $identifier;
        header('Location: forget-password.php');
        exit();
    } else {
        show_error_message("User ID or Email not found!");
    }
}

// Function to display error messages with "Go to Home" button
function show_error_message($message) {
    echo "<div style='text-align: center; margin-top: 50px; font-family: Arial, sans-serif;'>
            <h3 style='color: red;'>$message</h3>
            <a href='index.php'>
                <button style='padding: 10px 20px; font-size: 16px; color: white; background-color: blue; border: none; cursor: pointer;'>
                    Go to Home
                </button>
            </a>
          </div>";
    exit();
}
?>
