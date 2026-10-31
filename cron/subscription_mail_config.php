<?php
/**
 * ASSI Subscription Expiry Notification System
 * Configuration File
 *
 * Location: /cron/subscription_mail_config.php
 */

// Prevent multiple inclusions
if (defined('ASSI_SUBSCRIPTION_CONFIG_LOADED')) {
    return;
}
define('ASSI_SUBSCRIPTION_CONFIG_LOADED', true);

// Include main application database config
$mainConfigPath = dirname(__DIR__) . '/config.php';
if (file_exists($mainConfigPath)) {
    require_once $mainConfigPath;
}

/* =====================================================================
 * 1. SAFETY & ENVIRONMENT SETTINGS
 * =====================================================================
 * NOTE: As requested, LIVE_MODE is set to FALSE by default.
 * In TEST / DRY-RUN mode, no real users will be emailed.
 * Once you have tested and verified everything, change LIVE_MODE to true.
 * ===================================================================== */
define('SUBSCRIPTION_LIVE_MODE', false); // Set to true when ready to make live

// If LIVE_MODE is false and you want test emails sent to a specific email:
// (Leave empty to only log in dry-run mode, or enter your test email address)
define('DEFAULT_TEST_EMAIL', 'madhavangl20@gmail.com');

// Secret token to secure HTTP web-cron triggers:
// e.g., https://yourdomain.com/cron/send_expiry_reminders.php?token=assi_sub_cron_2025_secure
define('CRON_SECURITY_TOKEN', 'assi_sub_cron_2025_secure');

// Base URL for the website (used for renewal link in emails)
define('SITE_BASE_URL', 'https://www.assi.in');
define('RENEWAL_URL', SITE_BASE_URL . '/dashboard.php');

/* =====================================================================
 * 2. SMTP MAIL CONFIGURATION
 * ===================================================================== */
// Default Hostinger SMTP (or replace with Gmail / company SMTP)
define('SMTP_HOST', 'smtp.hostinger.com');
define('SMTP_PORT', 465); // 465 for SSL, 587 for TLS
define('SMTP_SECURE', 'ssl'); // 'ssl' or 'tls'
define('SMTP_AUTH', true);
define('SMTP_USER', 'assiteam@assi.in');
define('SMTP_PASS', 'Assiteam@#2k25');

// Sender details
define('MAIL_FROM_EMAIL', 'assiteam@assi.in');
define('MAIL_FROM_NAME', 'Association of Spine Surgeons of India (ASSI)');
define('MAIL_REPLYTO_EMAIL', 'assisecretariat@assi.in');
define('MAIL_REPLYTO_NAME', 'ASSI Secretariat');

// CC / BCC for monitoring (optional, leave empty if not needed)
define('MAIL_BCC_MONITOR', ''); // e.g. 'membershipdata@assi.in'

/* =====================================================================
 * 3. NOTIFICATION MILESTONE THRESHOLDS
 * =====================================================================
 * The user requested 4 stages:
 *  - 3 months before expiry (~90 days)
 *  - 1 month before expiry (~30 days)
 *  - 1 week before expiry (7 days)
 *  - 1 day before expiry (1 day)
 *
 * Windows are configured to ensure notifications are never missed
 * even if the cron runs slightly late or once a day.
 * ===================================================================== */
$notificationStages = [
    '3_months' => [
        'code'          => '3_months',
        'label'         => '3 Months Before Expiry',
        'target_days'   => 90,
        'min_days'      => 31,
        'max_days'      => 90,
        'badge'         => '3 Months Remaining',
        'badge_color'   => '#f59e0b', // Amber
        'badge_bg'      => '#fef3c7',
        'urgency'       => 'Early Reminder',
        'subject'       => 'Notice: Your ASSI Membership Expires in 3 Months'
    ],
    '1_month' => [
        'code'          => '1_month',
        'label'         => '1 Month Before Expiry',
        'target_days'   => 30,
        'min_days'      => 8,
        'max_days'      => 30,
        'badge'         => '1 Month Remaining',
        'badge_color'   => '#ea580c', // Orange
        'badge_bg'      => '#ffedd5',
        'urgency'       => 'Important Notice',
        'subject'       => 'Important: Your ASSI Membership Expires in 1 Month'
    ],
    '1_week' => [
        'code'          => '1_week',
        'label'         => '1 Week Before Expiry',
        'target_days'   => 7,
        'min_days'      => 2,
        'max_days'      => 7,
        'badge'         => '7 Days Remaining',
        'badge_color'   => '#dc2626', // Red
        'badge_bg'      => '#fee2e2',
        'urgency'       => 'Urgent Reminder',
        'subject'       => 'Urgent: Your ASSI Membership Will Expire in 7 Days'
    ],
    '1_day' => [
        'code'          => '1_day',
        'label'         => '1 Day Before Expiry',
        'target_days'   => 1,
        'min_days'      => 1,
        'max_days'      => 1,
        'badge'         => 'Final Notice - 24 Hours',
        'badge_color'   => '#991b1b', // Dark Red
        'badge_bg'      => '#fecaca',
        'urgency'       => 'Final Action Required',
        'subject'       => 'Final Notice: Your ASSI Membership Expires Tomorrow'
    ],
    'expired_today' => [
        'code'          => 'expired_today',
        'label'         => 'On Expiration Date (Today)',
        'target_days'   => 0,
        'min_days'      => 0,
        'max_days'      => 0,
        'badge'         => 'Expires Today',
        'badge_color'   => '#7f1d1d', // Deep Crimson
        'badge_bg'      => '#fee2e2',
        'urgency'       => 'Expires Today',
        'subject'       => 'Action Required: Your ASSI Membership Expires Today'
    ],
    'expired_1_week' => [
        'code'          => 'expired_1_week',
        'label'         => '1 Week After Expiry (Overdue)',
        'target_days'   => -7,
        'min_days'      => -7,
        'max_days'      => -1,
        'badge'         => 'Expired 1 Week Ago - Grace Period',
        'badge_color'   => '#b91c1c', // Crimson
        'badge_bg'      => '#fef2f2',
        'urgency'       => 'Account In Grace Period',
        'subject'       => 'Important: Your ASSI Membership Expired 1 Week Ago - Renewal Required'
    ],
    'expired_1_month' => [
        'code'          => 'expired_1_month',
        'label'         => '1 Month After Expiry (Suspended)',
        'target_days'   => -30,
        'min_days'      => -30,
        'max_days'      => -8,
        'badge'         => 'Expired 1 Month Ago - Suspended',
        'badge_color'   => '#991b1b',
        'badge_bg'      => '#fee2e2',
        'urgency'       => 'Benefits Temporarily Suspended',
        'subject'       => 'Notice: Your ASSI Membership Expired 1 Month Ago - Reactivate Today'
    ],
    'expired_3_months' => [
        'code'          => 'expired_3_months',
        'label'         => '3 Months After Expiry (Final Inactivity)',
        'target_days'   => -90,
        'min_days'      => -90,
        'max_days'      => -31,
        'badge'         => 'Expired 3 Months Ago - Final Notice',
        'badge_color'   => '#450a0a',
        'badge_bg'      => '#fecaca',
        'urgency'       => 'Final Deactivation Notice',
        'subject'       => 'Final Notice: Your ASSI Membership Expired 3 Months Ago'
    ]
];

// Log file path
define('SUBSCRIPTION_LOG_FILE', __DIR__ . '/subscription_mailer.log');
