<?php
/**
 * ASSI Subscription Expiry Email Templates
 *
 * Location: /cron/email_templates.php
 */

require_once __DIR__ . '/subscription_mail_config.php';

/**
 * Builds the subject line, HTML body, and plain-text body for an expiry notification.
 *
 * @param array $user
 * @param string $stage '3_months'|'1_month'|'1_week'|'1_day'
 * @param string $expiryDateFormatted (e.g. '15 November 2025' or '15-11-2025')
 * @param int $daysRemaining
 * @param string $renewalUrl
 * @return array ['subject' => string, 'html' => string, 'text' => string]
 */
function buildSubscriptionExpiryEmail(array $user, $stage, $expiryDateFormatted, $daysRemaining, $renewalUrl = RENEWAL_URL) {
    global $notificationStages;

    $stageConfig = $notificationStages[$stage] ?? [
        'badge'       => 'Subscription Notice',
        'badge_color' => '#1b56a5',
        'badge_bg'    => '#e0edff',
        'urgency'     => 'Membership Notification',
        'subject'     => 'Notice: Your ASSI Membership Expiration'
    ];

    $userName     = !empty($user['fullname']) ? trim($user['fullname']) : 'Esteemed Member';
    $userId       = !empty($user['user_id']) ? trim($user['user_id']) : 'N/A';
    $userEmail    = !empty($user['email']) ? trim($user['email']) : '';
    $userPhone    = !empty($user['phonenumber']) ? trim($user['phonenumber']) : '';
    $category     = !empty($user['membership_category']) ? trim($user['membership_category']) : 'Annual';
    $plan         = !empty($user['membership_plan']) ? trim($user['membership_plan']) : 'Standard';
    $logoUrl      = SITE_BASE_URL . '/assets/img/assi/assi-logo.png';

    $phoneRow = !empty($userPhone) ? "<tr><td class=\"label\">Mobile / Phone</td><td class=\"value\">{$userPhone}</td></tr>" : "";

    // Tailored messaging for each stage
    $btnText = "RENEW MEMBERSHIP NOW &rarr;";

    // Dynamic highlighted date badge
    $highlightedDate = "<span style=\"background-color: #fee2e2; color: #991b1b; padding: 3px 9px; border-radius: 4px; font-weight: 800; border: 1.5px solid #f87171; display: inline-block;\">📅 {$expiryDateFormatted}</span>";

    switch ($stage) {
        case '3_months':
            $headline = "Your ASSI Membership Will Expire in 3 Months";
            $subHeadline = "Early Renewal Reminder";
            $bannerBg = "#f59e0b";
            $highlightRemaining = "<span style=\"background-color: #fef3c7; color: #92400e; padding: 3px 9px; border-radius: 4px; font-weight: 800; border: 1.5px solid #fde68a; display: inline-block;\">⏳ 3 Months (90 Days Remaining)</span>";
            $introText = "We hope you are enjoying the professional privileges and educational resources provided through your ASSI membership. This is a friendly reminder that your subscription is scheduled to expire in {$highlightRemaining} on {$highlightedDate}.";
            $actionText = "Renewing early guarantees uninterrupted access to the Indian Spine Journal (ISJ), subsidized conference delegate passes, research grants, and our verified member directory.";
            $btnText = "RENEW MEMBERSHIP NOW &rarr;";
            break;

        case '1_month':
            $headline = "Your ASSI Membership Will Expire in 1 Month";
            $subHeadline = "Important Renewal Notice";
            $bannerBg = "#ea580c";
            $highlightRemaining = "<span style=\"background-color: #ffedd5; color: #9a3412; padding: 3px 9px; border-radius: 4px; font-weight: 800; border: 1.5px solid #fdba74; display: inline-block;\">⏳ 1 Month (30 Days Remaining)</span>";
            $introText = "This is an important reminder that your ASSI membership subscription will expire in {$highlightRemaining} on {$highlightedDate}.";
            $actionText = "Please take a moment to renew your membership now to maintain your active standing, research registry participation, and continuous membership certification without disruption.";
            $btnText = "RENEW MEMBERSHIP NOW &rarr;";
            break;

        case '1_week':
            $headline = "Your ASSI Membership Will Expire in 7 Days";
            $subHeadline = "Urgent: 1 Week Remaining";
            $bannerBg = "#dc2626";
            $highlightRemaining = "<span style=\"background-color: #fee2e2; color: #991b1b; padding: 3px 9px; border-radius: 4px; font-weight: 800; border: 1.5px solid #fca5a5; display: inline-block;\">🚨 7 Days Remaining (Urgent)</span>";
            $introText = "This is an urgent reminder that your ASSI membership subscription will expire in {$highlightRemaining} on {$highlightedDate}.";
            $actionText = "Your membership access and active benefits will lapse unless renewed. Online renewal takes less than 2 minutes through your secure member portal.";
            $btnText = "RENEW MEMBERSHIP NOW &rarr;";
            break;

        case '1_day':
            $headline = "Final Notice: Your ASSI Membership Expires Tomorrow";
            $subHeadline = "Action Required - 24 Hours Remaining";
            $bannerBg = "#991b1b";
            $highlightRemaining = "<span style=\"background-color: #fef2f2; color: #7f1d1d; padding: 3px 9px; border-radius: 4px; font-weight: 900; border: 2px solid #dc2626; display: inline-block;\">🚨 Tomorrow (24 Hours Remaining)</span>";
            $introText = "This is your final notice. Your ASSI membership subscription expires {$highlightRemaining} on {$highlightedDate}.";
            $actionText = "To avoid lapse of active membership status, journal access, and member directory visibility, please complete your online renewal immediately.";
            $btnText = "RENEW MEMBERSHIP NOW &rarr;";
            break;

        case 'expired_today':
            $headline = "Action Required: Your ASSI Membership Expires Today";
            $subHeadline = "Expiration Date: Today";
            $bannerBg = "#b91c1c";
            $highlightToday = "<span style=\"background-color: #7f1d1d; color: #ffffff; padding: 3px 9px; border-radius: 4px; font-weight: 900; letter-spacing: 0.5px; display: inline-block;\">⏰ EXPIRES TODAY</span>";
            $introText = "This is an official notification that your ASSI membership subscription {$highlightToday} on {$highlightedDate}.";
            $actionText = "To prevent immediate disruption to your member privileges, journal subscription, and official directory listing, please complete your renewal today.";
            $btnText = "RENEW MEMBERSHIP TODAY &rarr;";
            break;

        case 'expired_1_week':
            $headline = "Important: Your ASSI Membership Expired 1 Week Ago";
            $subHeadline = "Grace Period Active - Renewal Required";
            $bannerBg = "#c2410c";
            $highlightAgo = "<span style=\"background-color: #ffedd5; color: #9a3412; padding: 3px 9px; border-radius: 4px; font-weight: 900; border: 1.5px solid #fdba74; display: inline-block;\">⚠️ 1 Week Ago (Expired 7 Days Ago)</span>";
            $introText = "Our records show that your ASSI membership subscription expired on {$highlightedDate} ({$highlightAgo}). You are currently in our <strong>courtesy grace period</strong>.";
            $actionText = "During this grace period, your member portal remains active, but upcoming conference discounts and research grant eligibility will be suspended if not renewed. Please renew now to maintain your active tenure.";
            $btnText = "RENEW & RESTORE ACCESS &rarr;";
            break;

        case 'expired_1_month':
            $headline = "Notice: Your ASSI Membership Expired 1 Month Ago";
            $subHeadline = "Benefits Suspended - Reactivate Today";
            $bannerBg = "#991b1b";
            $highlightAgo = "<span style=\"background-color: #fee2e2; color: #991b1b; padding: 3px 9px; border-radius: 4px; font-weight: 900; border: 1.5px solid #f87171; display: inline-block;\">⛔ 1 Month Ago (Expired 30 Days Ago)</span>";
            $introText = "This notice is to inform you that your ASSI membership expired on {$highlightedDate} ({$highlightAgo}) and has not been renewed.";
            $actionText = "Your active member privileges, including online access to the Indian Spine Journal and verified directory listing, have been <strong>temporarily placed on hold</strong>. You can reactivate your membership instantly online without re-applying.";
            $btnText = "REACTIVATE MEMBERSHIP NOW &rarr;";
            break;

        case 'expired_3_months':
            $headline = "Final Notice: Your ASSI Membership Expired 3 Months Ago";
            $subHeadline = "Account Inactive - Final Notice";
            $bannerBg = "#7f1d1d";
            $highlightAgo = "<span style=\"background-color: #450a0a; color: #fee2e2; padding: 3px 9px; border-radius: 4px; font-weight: 900; border: 1.5px solid #dc2626; display: inline-block;\">🛑 3 Months Ago (Expired 90 Days Ago)</span>";
            $introText = "This is our final notice regarding your ASSI membership subscription, which expired on {$highlightedDate} ({$highlightAgo}).";
            $actionText = "Your account is currently marked as <strong>inactive</strong> in the ASSI registry. To avoid the forfeiture of your continuous membership tenure and having to undergo re-verification by the credentials committee, please reactivate your membership online today.";
            $btnText = "REACTIVATE MEMBERSHIP TODAY &rarr;";
            break;

        default:
            $headline = "Official Notice: ASSI Membership Renewal";
            $subHeadline = "Membership Renewal Notification";
            $bannerBg = "#1b56a5";
            $introText = "This is an official notice regarding your ASSI membership subscription (Expiration Date: {$highlightedDate}).";
            $actionText = "Please log in to your member dashboard to complete your renewal and preserve your active membership standing.";
            $btnText = "RENEW MEMBERSHIP NOW &rarr;";
            break;
    }

    // Ribbon text, dedicated timeline highlight box, and table display calculation
    if ($daysRemaining > 0) {
        $ribbonStatus = "{$daysRemaining} Days Remaining";
        $tableExpiryDisplay = "<span style=\"background-color: #fee2e2; color: #991b1b; padding: 5px 12px; border-radius: 6px; font-weight: 800; border: 1.5px solid #f87171; display: inline-block; font-size: 14px;\">📅 {$expiryDateFormatted}</span><br><span style=\"display: inline-block; margin-top: 5px; background-color: #fef3c7; color: #92400e; padding: 3px 9px; border-radius: 4px; font-weight: 800; font-size: 12px; border: 1px solid #fde68a;\">⏳ {$daysRemaining} Days Remaining</span>";
        $timelineAlertBox = <<<ALERT
        <div style="background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%); border: 2px solid #f59e0b; border-radius: 10px; padding: 14px 18px; margin: 22px 0; text-align: center; box-shadow: 0 2px 8px rgba(245, 158, 11, 0.12);">
          <div style="font-size: 11px; font-weight: 800; letter-spacing: 1px; color: #b45309; text-transform: uppercase; margin-bottom: 6px;">⏳ SUBSCRIPTION TIMELINE REMINDER</div>
          <table style="width: 100%; border-collapse: collapse;">
            <tr>
              <td style="width: 50%; padding: 4px 10px; text-align: center; border-right: 1px dashed #fcd34d;">
                <span style="font-size: 12px; color: #78350f; display: block; font-weight: 600;">EXPIRATION DATE</span>
                <span style="display: inline-block; background-color: #ffffff; color: #991b1b; padding: 6px 14px; border-radius: 6px; font-weight: 800; font-size: 15px; border: 1.5px solid #f87171; margin-top: 4px;">📅 {$expiryDateFormatted}</span>
              </td>
              <td style="width: 50%; padding: 4px 10px; text-align: center;">
                <span style="font-size: 12px; color: #78350f; display: block; font-weight: 600;">DAYS REMAINING</span>
                <span style="display: inline-block; background-color: #fef08a; color: #854d0e; padding: 6px 14px; border-radius: 6px; font-weight: 800; font-size: 15px; border: 1.5px solid #eab308; margin-top: 4px;">⏳ {$daysRemaining} Days Left</span>
              </td>
            </tr>
          </table>
        </div>
ALERT;
        $plainTiming = "is scheduled to expire in [{$daysRemaining} Days Remaining] on [{$expiryDateFormatted}]";
    } elseif ($daysRemaining === 0) {
        $ribbonStatus = "Expires Today";
        $tableExpiryDisplay = "<span style=\"background-color: #fee2e2; color: #991b1b; padding: 5px 12px; border-radius: 6px; font-weight: 800; border: 1.5px solid #f87171; display: inline-block; font-size: 14px;\">📅 {$expiryDateFormatted}</span><br><span style=\"display: inline-block; margin-top: 5px; background-color: #7f1d1d; color: #ffffff; padding: 3px 9px; border-radius: 4px; font-weight: 900; font-size: 12px;\">⏰ EXPIRES TODAY</span>";
        $timelineAlertBox = <<<ALERT
        <div style="background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%); border: 2.5px solid #dc2626; border-radius: 10px; padding: 14px 18px; margin: 22px 0; text-align: center; box-shadow: 0 2px 10px rgba(220, 38, 38, 0.18);">
          <div style="font-size: 11px; font-weight: 800; letter-spacing: 1px; color: #991b1b; text-transform: uppercase; margin-bottom: 6px;">🚨 EXPIRATION ALERT - FINAL ACTION REQUIRED</div>
          <table style="width: 100%; border-collapse: collapse;">
            <tr>
              <td style="width: 50%; padding: 4px 10px; text-align: center; border-right: 1px dashed #fca5a5;">
                <span style="font-size: 12px; color: #7f1d1d; display: block; font-weight: 600;">EXPIRATION DATE</span>
                <span style="display: inline-block; background-color: #ffffff; color: #991b1b; padding: 6px 14px; border-radius: 6px; font-weight: 800; font-size: 15px; border: 1.5px solid #dc2626; margin-top: 4px;">📅 {$expiryDateFormatted}</span>
              </td>
              <td style="width: 50%; padding: 4px 10px; text-align: center;">
                <span style="font-size: 12px; color: #7f1d1d; display: block; font-weight: 600;">STATUS</span>
                <span style="display: inline-block; background-color: #dc2626; color: #ffffff; padding: 6px 14px; border-radius: 6px; font-weight: 900; font-size: 15px; margin-top: 4px; letter-spacing: 0.5px;">⏰ EXPIRES TODAY</span>
              </td>
            </tr>
          </table>
        </div>
ALERT;
        $plainTiming = "EXPIRES TODAY on [{$expiryDateFormatted}]";
    } else {
        $daysAgo = abs($daysRemaining);
        $ribbonStatus = "Expired {$daysAgo} Days Ago";
        $tableExpiryDisplay = "<span style=\"background-color: #fee2e2; color: #991b1b; padding: 5px 12px; border-radius: 6px; font-weight: 800; border: 1.5px solid #f87171; display: inline-block; font-size: 14px;\">📅 {$expiryDateFormatted}</span><br><span style=\"display: inline-block; margin-top: 5px; background-color: #7f1d1d; color: #ffffff; padding: 3px 9px; border-radius: 4px; font-weight: 900; font-size: 12px;\">⚠️ EXPIRED {$daysAgo} DAYS AGO</span>";
        $timelineAlertBox = <<<ALERT
        <div style="background: linear-gradient(135deg, #fff1f2 0%, #fee2e2 100%); border: 2.5px solid #b91c1c; border-radius: 10px; padding: 14px 18px; margin: 22px 0; text-align: center; box-shadow: 0 2px 10px rgba(185, 28, 28, 0.18);">
          <div style="font-size: 11px; font-weight: 800; letter-spacing: 1px; color: #7f1d1d; text-transform: uppercase; margin-bottom: 6px;">⚠️ MEMBERSHIP OVERDUE NOTICE</div>
          <table style="width: 100%; border-collapse: collapse;">
            <tr>
              <td style="width: 50%; padding: 4px 10px; text-align: center; border-right: 1px dashed #fca5a5;">
                <span style="font-size: 12px; color: #7f1d1d; display: block; font-weight: 600;">EXPIRED DATE</span>
                <span style="display: inline-block; background-color: #ffffff; color: #991b1b; padding: 6px 14px; border-radius: 6px; font-weight: 800; font-size: 15px; border: 1.5px solid #dc2626; margin-top: 4px;">📅 {$expiryDateFormatted}</span>
              </td>
              <td style="width: 50%; padding: 4px 10px; text-align: center;">
                <span style="font-size: 12px; color: #7f1d1d; display: block; font-weight: 600;">ELAPSED DAYS</span>
                <span style="display: inline-block; background-color: #7f1d1d; color: #ffffff; padding: 6px 14px; border-radius: 6px; font-weight: 900; font-size: 15px; margin-top: 4px; letter-spacing: 0.5px;">⚠️ EXPIRED {$daysAgo} DAYS AGO</span>
              </td>
            </tr>
          </table>
        </div>
ALERT;
        $plainTiming = "expired [{$daysAgo} Days Ago] on [{$expiryDateFormatted}]";
    }

    $subject = $stageConfig['subject'] . " (ID: {$userId})";

    // Build the responsive HTML body
    $html = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{$subject}</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #f1f5f9;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
      color: #334155;
      -webkit-font-smoothing: antialiased;
    }
    table {
      border-collapse: collapse;
    }
    .wrapper {
      width: 100%;
      background-color: #f1f5f9;
      padding: 30px 10px;
    }
    .container {
      max-width: 620px;
      margin: 0 auto;
      background-color: #ffffff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      border: 1px solid #e2e8f0;
    }
    .header {
      background: linear-gradient(135deg, #1b56a5 0%, #0d3b75 100%);
      padding: 28px 24px;
      text-align: center;
      color: #ffffff;
    }
    .header img {
      max-height: 55px;
      width: auto;
      margin-bottom: 10px;
      background: #ffffff;
      padding: 6px 12px;
      border-radius: 6px;
    }
    .header h1 {
      margin: 8px 0 0;
      font-size: 20px;
      font-weight: 600;
      letter-spacing: 0.5px;
    }
    .header p {
      margin: 4px 0 0;
      font-size: 13px;
      opacity: 0.85;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    .urgency-ribbon {
      background-color: {$bannerBg};
      color: #ffffff;
      text-align: center;
      padding: 10px 15px;
      font-size: 13px;
      font-weight: 700;
      letter-spacing: 0.8px;
      text-transform: uppercase;
    }
    .content {
      padding: 32px 30px;
    }
    .greeting {
      font-size: 18px;
      font-weight: 600;
      color: #0f172a;
      margin-top: 0;
      margin-bottom: 14px;
    }
    .intro {
      font-size: 15px;
      line-height: 1.65;
      color: #334155;
      margin-bottom: 18px;
    }
    .badge-pill {
      display: inline-block;
      padding: 6px 14px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 700;
      color: {$stageConfig['badge_color']};
      background-color: {$stageConfig['badge_bg']};
      margin-bottom: 20px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .details-card {
      background-color: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      padding: 18px 20px;
      margin: 22px 0;
    }
    .details-card table {
      width: 100%;
    }
    .details-card td {
      padding: 8px 6px;
      font-size: 14px;
      vertical-align: middle;
    }
    .details-card .label {
      color: #64748b;
      font-weight: 500;
      width: 42%;
    }
    .details-card .value {
      color: #0f172a;
      font-weight: 600;
      text-align: right;
    }
    .details-card .highlight-expiry {
      color: #b91c1c;
      font-weight: 700;
      font-size: 15px;
    }
    .cta-container {
      text-align: center;
      margin: 32px 0 20px;
    }
    .btn-renew {
      display: inline-block;
      background: linear-gradient(135deg, #1b56a5 0%, #0d3b75 100%);
      color: #ffffff !important;
      text-decoration: none;
      padding: 15px 36px;
      font-size: 15px;
      font-weight: 700;
      border-radius: 30px;
      box-shadow: 0 4px 14px rgba(27, 86, 165, 0.35);
      letter-spacing: 0.3px;
    }
    .btn-renew:hover {
      background: #0d3b75;
    }
    .benefits-box {
      border-left: 3px solid #1b56a5;
      padding: 12px 16px;
      background-color: #f0f7ff;
      border-radius: 0 6px 6px 0;
      margin: 24px 0;
      font-size: 13px;
      color: #1e3a8a;
      line-height: 1.5;
    }
    .support-note {
      font-size: 13px;
      color: #64748b;
      line-height: 1.5;
      border-top: 1px solid #e2e8f0;
      padding-top: 18px;
      margin-top: 24px;
    }
    .footer {
      background-color: #0f172a;
      color: #94a3b8;
      padding: 24px;
      text-align: center;
      font-size: 12px;
      line-height: 1.6;
    }
    .footer a {
      color: #38bdf8;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="container">
      
      <!-- Top Urgency Ribbon -->
      <div class="urgency-ribbon">
        {$subHeadline} &bull; {$ribbonStatus}
      </div>

      <!-- Main Header -->
      <div class="header">
        <img src="{$logoUrl}" alt="ASSI Logo" />
        <h1>Association of Spine Surgeons of India</h1>
        <p>Official Membership Notification</p>
      </div>

      <!-- Content Area -->
      <div class="content">
        <span class="badge-pill">{$stageConfig['badge']}</span>
        
        <h2 class="greeting">Dear {$userName},</h2>
        
        <p class="intro">{$introText}</p>
        <p class="intro">{$actionText}</p>

        <!-- Prominent Expiry & Timeline Highlight Box -->
        {$timelineAlertBox}

        <!-- Member & Subscription Details Table -->
        <div class="details-card">
          <table>
            <tr>
              <td class="label">Member Name</td>
              <td class="value">{$userName}</td>
            </tr>
            <tr>
              <td class="label">Membership / User ID</td>
              <td class="value">{$userId}</td>
            </tr>
            <tr>
              <td class="label">Registered Email</td>
              <td class="value">{$userEmail}</td>
            </tr>
            <tr>
              <td class="label">Membership Category</td>
              <td class="value">{$category}</td>
            </tr>
            <tr>
              <td class="label">Current Plan</td>
              <td class="value">{$plan}</td>
            </tr>
            {$phoneRow}
            <tr>
              <td class="label">Expiration & Timeline</td>
              <td class="value highlight-expiry">{$tableExpiryDisplay}</td>
            </tr>
          </table>
        </div>

        <!-- Call to Action Button -->
        <div class="cta-container">
          <a href="{$renewalUrl}" target="_blank" class="btn-renew">
            {$btnText}
          </a>
          <div style="font-size: 12px; color: #94a3b8; margin-top: 10px;">
            Or log in directly at <a href="{$renewalUrl}" style="color: #1b56a5;">{$renewalUrl}</a>
          </div>
        </div>

        <!-- Membership Benefits Preserved Box -->
        <div class="benefits-box">
          <strong>Retain Your ASSI Member Privileges:</strong>
          <ul style="margin: 6px 0 0; padding-left: 18px;">
            <li>Official inclusion in the ASSI Online Spine Surgeon Directory</li>
            <li>Full online subscription & archive access to the Indian Spine Journal (ISJ)</li>
            <li>Eligibility for ASSI Fellowships, Traveling Awards, and Research Grants</li>
            <li>Subsidized registration fees for ASSICON and national instructional courses</li>
          </ul>
        </div>

        <!-- Support Info -->
        <div class="support-note">
          <strong>Need Assistance or Have Questions?</strong><br>
          If you have already submitted your renewal payment or require any assistance updating your profile, please contact our secretariat team at
          <a href="mailto:assisecretariat@assi.in" style="color: #1b56a5; font-weight: 600;">assisecretariat@assi.in</a> or
          <a href="mailto:membershipdata@assi.in" style="color: #1b56a5; font-weight: 600;">membershipdata@assi.in</a>.
        </div>
      </div>

      <!-- Footer -->
      <div class="footer">
        <strong>Association of Spine Surgeons of India (ASSI)</strong><br>
        Advancing Spine Care, Research & Professional Excellence<br>
        Website: <a href="https://www.assi.in" target="_blank">www.assi.in</a> &bull; Email: <a href="mailto:assisecretariat@assi.in">assisecretariat@assi.in</a><br>
        <div style="margin-top: 10px; font-size: 11px; color: #64748b;">
          This is an automated subscription reminder sent to {$userEmail}. Please do not reply directly to this automated email.
        </div>
      </div>

    </div>
  </div>
</body>
</html>
HTML;

    // Plain text alternative
    $text = "Dear {$userName},\n\n";
    $text .= "This is an official notification from the Association of Spine Surgeons of India (ASSI).\n\n";
    $text .= "{$headline}\n";
    $text .= "Your membership subscription {$plainTiming}.\n\n";
    $text .= "============================================================\n";
    $text .= "EXPIRY & TIMELINE STATUS:\n";
    $text .= "- Expiration Date : [ {$expiryDateFormatted} ]\n";
    $text .= "- Timeline Status : [ {$ribbonStatus} ]\n";
    $text .= "============================================================\n\n";
    $text .= "Membership Details:\n";
    $text .= "- Member: {$userName}\n";
    $text .= "- Membership ID: {$userId}\n";
    $text .= "- Category: {$category}\n";
    $text .= "- Plan: {$plan}\n";
    if (!empty($userPhone)) {
        $text .= "- Contact: {$userPhone}\n";
    }
    $text .= "- Registered Email: {$userEmail}\n";
    $text .= "- Expiry Date: {$expiryDateFormatted} ({$ribbonStatus})\n\n";
    $text .= "Please renew your membership online to ensure uninterrupted access to member benefits:\n";
    $text .= "{$renewalUrl}\n\n";
    $text .= "For any assistance, contact us at assisecretariat@assi.in or membershipdata@assi.in.\n\n";
    $text .= "Regards,\nASSI Secretariat\nwww.assi.in\n";

    return [
        'subject' => $subject,
        'html'    => $html,
        'text'    => $text
    ];
}
