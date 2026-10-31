<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer
require 'vendor/autoload.php';

// Create instance
$mail = new PHPMailer(true);

try {
    // SMTP Configuration
    $mail->SMTPDebug = 2;  // Use 3 or 4 for more details
$mail->Debugoutput = 'html';
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com'; // Change to your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'assiteam@assi.in'; // Replace with your email
    $mail->Password = 'Assiteam@#2k25'; // Replace with your email password or app password
    $mail->SMTPSecure = 'ssl'; // Use 'tls' if port 587
    $mail->Port = 465; // Use 587 for TLS

    // Sender and Recipient
    $mail->setFrom('assiteam@assi.in', 'Your Name');
    $mail->addAddress('arunduraideveloper@gmail.com', 'Recipient Name'); // Change to recipient email

    // Email Content
    $mail->isHTML(true);
   $mail->Subject = "Verify Your Account - Action Required";
 $mail->Body = "<p>Dear User,</p><p>Your verification code is: <strong>123456</strong></p><p>Regards,<br>Assi Team</p>";

    // Send Email
    if ($mail->send()) {
        echo 'Test email has been sent successfully!';
    } else {
        echo 'Error: ' . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo 'Message could not be sent. Error: ' . $mail->ErrorInfo;
}
?>
