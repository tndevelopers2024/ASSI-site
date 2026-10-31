<?php
/**
 * ASSI Subscription Mailer Service
 * Encapsulates PHPMailer sending logic.
 *
 * Location: /cron/mailer_service.php
 */

require_once __DIR__ . '/subscription_mail_config.php';

// Load PHPMailer
if (file_exists(dirname(__DIR__) . '/vendor/autoload.php')) {
    require_once dirname(__DIR__) . '/vendor/autoload.php';
} elseif (file_exists(dirname(__DIR__) . '/PHPMailer/src/PHPMailer.php')) {
    require_once dirname(__DIR__) . '/PHPMailer/src/Exception.php';
    require_once dirname(__DIR__) . '/PHPMailer/src/PHPMailer.php';
    require_once dirname(__DIR__) . '/PHPMailer/src/SMTP.php';
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Sends an email using configured SMTP settings.
 *
 * @param string $toEmail Recipient email address
 * @param string $toName Recipient full name
 * @param string $subject Email subject
 * @param string $htmlBody HTML content
 * @param string $textBody Plain text fallback
 * @param bool $debug Whether to capture SMTP debug output
 * @return array ['success' => bool, 'message' => string, 'debug' => string]
 */
function sendSubscriptionMail($toEmail, $toName, $subject, $htmlBody, $textBody = '', $debug = false) {
    if (!filter_var($toEmail, FILTER_VALIDATE_EMAIL)) {
        return [
            'success' => false,
            'message' => "Invalid recipient email address: '{$toEmail}'",
            'debug'   => ''
        ];
    }

    $mail = new PHPMailer(true);
    $debugOutput = '';

    try {
        // SMTP Server configuration
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = SMTP_AUTH;
        $mail->Username   = SMTP_USER;
        $mail->Password   = SMTP_PASS;
        $mail->Port       = SMTP_PORT;

        if (SMTP_SECURE === 'ssl') {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        } elseif (SMTP_SECURE === 'tls') {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        } else {
            $mail->SMTPSecure = false;
            $mail->SMTPAutoTLS = false;
        }

        // Timeouts
        $mail->Timeout = 15;
        $mail->CharSet = 'UTF-8';

        // Capture debug output if requested
        if ($debug) {
            $mail->SMTPDebug = 2;
            $mail->Debugoutput = function($str, $level) use (&$debugOutput) {
                $debugOutput .= "[$level] $str\n";
            };
        } else {
            $mail->SMTPDebug = 0;
        }

        // Sender & Recipient
        $mail->setFrom(MAIL_FROM_EMAIL, MAIL_FROM_NAME);
        $mail->addAddress($toEmail, $toName);

        if (defined('MAIL_REPLYTO_EMAIL') && !empty(MAIL_REPLYTO_EMAIL)) {
            $mail->addReplyTo(MAIL_REPLYTO_EMAIL, MAIL_REPLYTO_NAME);
        }

        if (defined('MAIL_BCC_MONITOR') && !empty(MAIL_BCC_MONITOR)) {
            $mail->addBCC(MAIL_BCC_MONITOR);
        }

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $htmlBody;
        $mail->AltBody = !empty($textBody) ? $textBody : strip_tags($htmlBody);

        // Send mail
        $sent = $mail->send();

        if ($sent) {
            return [
                'success' => true,
                'message' => 'Email sent successfully to ' . $toEmail,
                'debug'   => $debugOutput
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Mailer send returned false: ' . $mail->ErrorInfo,
                'debug'   => $debugOutput
            ];
        }

    } catch (Exception $e) {
        return [
            'success' => false,
            'message' => 'PHPMailer Exception: ' . $e->getMessage() . ' | ErrorInfo: ' . $mail->ErrorInfo,
            'debug'   => $debugOutput
        ];
    } catch (\Throwable $t) {
        return [
            'success' => false,
            'message' => 'General Error: ' . $t->getMessage(),
            'debug'   => $debugOutput
        ];
    }
}
