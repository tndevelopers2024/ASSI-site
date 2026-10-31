<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure you have PHPMailer installed

// Google Apps Script URL (replace with your script URL)
$scriptUrl = "https://script.google.com/macros/s/AKfycbw8KDcZFk_yDoUNIsY7OSu2QzrxcM51sxxZTiJ4hsh67sigM-Ctf79UU6b7VP5ODorkuw/exec";

// Check for honeypot (an invisible field that bots might fill in)
if (!empty($_POST['honeypot'])) {
    die("Spam detected. Submission failed.");
}

// Basic validation function
function validateInput($data, $type = 'text') {
    if ($type === 'email') {
        return filter_var($data, FILTER_VALIDATE_EMAIL);
    } elseif ($type === 'phone') {
        return preg_match('/^[0-9\-\(\)\/\+\s]*$/', $data);
    }
    return !empty(trim($data));
}

// Validate form fields (ensure no fields are empty or invalid)
if (
    !validateInput($_POST['email'], 'email') ||
    !validateInput($_POST['phone'], 'phone') ||
    !validateInput($_POST['name']) ||
    !validateInput($_POST['referrer_email'], 'email') ||
    !validateInput($_POST['referrer_phone'], 'phone') ||
    !validateInput($_POST['referrer2_email'], 'email') ||
    !validateInput($_POST['referrer2_phone'], 'phone')
) {
    die("Invalid input detected. Submission failed.");
}

// Initialize PHPMailer
$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->SMTPDebug = false;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'assisecretariat@assi.in';
    $mail->Password = 'favndayuuqgulima';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('_mainaccount@assi.in', 'Assi');

    // Multiple recipients
    $recipients = ['memberships.assi@gmail.com','assisecretariat@assi.in','membershipdata@assi.in','hemanth@pixelmonkeydigital.com','secretary@assi.in', 'jtsecretary@assi.in', 'prem@pixelmonkeydigital.com'];
    
    // Add referrer emails if they are valid
    if (!empty($_POST['referrer_email']) && filter_var($_POST['referrer_email'], FILTER_VALIDATE_EMAIL)) {
        $recipients[] = trim($_POST['referrer_email']);
    }
    if (!empty($_POST['referrer2_email']) && filter_var($_POST['referrer2_email'], FILTER_VALIDATE_EMAIL)) {
        $recipients[] = trim($_POST['referrer2_email']);
    }

    foreach ($recipients as $recipient) {
        $mail->addAddress($recipient);
    }

    // Email subject and body
    $mail->isHTML(true);
    $mail->Subject = 'Membership Form Submission';

    // Collect and sanitize form data
    $data = [
        'membershipType' => htmlspecialchars($_POST['membership-typ']),
        'prof' => htmlspecialchars($_POST['prof']),
        'name' => htmlspecialchars($_POST['name']),
        'badgeName' => htmlspecialchars($_POST['badgename']),
        'gender' => htmlspecialchars($_POST['gender-type']),
        'email' => htmlspecialchars($_POST['email']),
        'phone' => htmlspecialchars($_POST['phone']),
        'address' => htmlspecialchars($_POST['address']),
        'pphone' => htmlspecialchars($_POST['pphone']),
        'date' => htmlspecialchars($_POST['date']),
        'qualification' => htmlspecialchars($_POST['qualification']),
        'mbbsPassoutYear' => htmlspecialchars($_POST['mbbspassoutyear']),
        'mbbsCollege' => htmlspecialchars($_POST['mbbscollege']),
        'mbbsUniversity' => htmlspecialchars($_POST['mbbsuniversity']),
        'msPassoutYear' => htmlspecialchars($_POST['mspassoutyear']),
        'msCollege' => htmlspecialchars($_POST['mscollege']),
        'msUniversity' => htmlspecialchars($_POST['msuniversity']),
        'mchPassoutYear' => htmlspecialchars($_POST['mchpassoutyear']),
        'mchCollege' => htmlspecialchars($_POST['mchcollege']),
        'mchUniversity' => htmlspecialchars($_POST['mchuniversity']),
        'spine' => htmlspecialchars($_POST['spine']),
        'currentOrg' => htmlspecialchars($_POST['current-org']),
        'nameofCouncil' => htmlspecialchars($_POST['nameofcouncil']),
        'registrationNo' => htmlspecialchars($_POST['registrationno']),
        'validityDate' => htmlspecialchars($_POST['validitydate']),
        'referred' => htmlspecialchars($_POST['referred']),
        'referrerEmail' => htmlspecialchars($_POST['referrer_email']),
        'referrerPhone' => htmlspecialchars($_POST['referrer_phone']),
        'referrer2Name' => htmlspecialchars($_POST['referrer2_name']),
        'referrer2Email' => htmlspecialchars($_POST['referrer2_email']),
        'referrer2Phone' => htmlspecialchars($_POST['referrer2_phone']),
        'agree' => isset($_POST['agree']) ? 'Agreed' : 'Not Agreed',
    ];

    // Build HTML email body
    $body = "<h2>Membership Form Submission</h2>";
    $body .= "<p>Request the referee doctors to review the members below and approve or reject their applications.</p>";
    $body .= "<table border='1' cellpadding='5' cellspacing='0' style='width: 100%;'>";
    foreach ($data as $key => $value) {
        $body .= "<tr><td><strong>" . ucfirst(str_replace('_', ' ', $key)) . "</strong></td><td>{$value}</td></tr>";
    }
    $body .= "</table>";
    $mail->Body = $body;

    // Handle file attachments
    $fileNames = [
        'recent-img' => 'RecentImage.jpg',
        'medical-council' => 'Medical_Council_Registration.pdf',
    ];
    foreach ($fileNames as $inputName => $fileName) {
        if (!empty($_FILES[$inputName]['tmp_name'])) {
            $mail->addAttachment($_FILES[$inputName]['tmp_name'], $fileName);
        }
    }

    // Send email
    $mail->send();

    // Send data to Google Apps Script
    $postData = $data;
    foreach ($fileNames as $fileField => $fileName) {
        if (!empty($_FILES[$fileField]['tmp_name'])) {
            $fileContent = file_get_contents($_FILES[$fileField]['tmp_name']);
            $postData[$fileField] = base64_encode($fileContent);
            $postData[$fileField . '_fileName'] = $fileName;
            $postData[$fileField . '_mimeType'] = $_FILES[$fileField]['type'];
        }
    }

    // Send data to Google Apps Script
    $ch = curl_init($scriptUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "Error: " . curl_error($ch);
    }

    // Redirect to success page
    header("Location: success.php");
    exit();

} catch (Exception $e) {
    echo "Error: " . $mail->ErrorInfo;
}
?>
