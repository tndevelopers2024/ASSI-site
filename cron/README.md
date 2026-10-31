# ASSI Automated Subscription Expiry Notification System

This directory contains the automated mailing system that alerts ASSI members before their subscription expires.

---

## 📅 Notification Milestones (Pre & Post Expiry)

Emails are triggered at designated milestones across the entire subscription lifecycle:

### 1. Before Expiry Reminders
| Stage | Window Before Expiry | Urgency / Tone | Email Subject |
| :--- | :--- | :--- | :--- |
| **3 Months** | 31 to 90 Days Remaining | Friendly Reminder | `Notice: Your ASSI Membership Expires in 3 Months` |
| **1 Month** | 8 to 30 Days Remaining | Important Reminder | `Important: Your ASSI Membership Expires in 1 Month` |
| **1 Week** | 2 to 7 Days Remaining | Urgent Notice | `Urgent: Your ASSI Membership Will Expire in 7 Days` |
| **1 Day** | 1 Day Remaining | Final 24-Hour Notice | `Final Notice: Your ASSI Membership Expires Tomorrow` |

### 2. On Expiration Date & Post-Expiry Notifications
| Stage | Window Relative to Expiry | Urgency / Tone | Email Subject |
| :--- | :--- | :--- | :--- |
| **Expiring Date** | 0 Days (Expires Today) | Action Required | `Action Required: Your ASSI Membership Expires Today` |
| **1 Week After** | 1 to 7 Days Expired | Grace Period Notice | `Important: Your ASSI Membership Expired 1 Week Ago - Renewal Required` |
| **1 Month After**| 8 to 30 Days Expired | Suspended Benefits | `Notice: Your ASSI Membership Expired 1 Month Ago - Reactivate Today` |
| **3 Months After**| 31 to 90 Days Expired | Final Deactivation | `Final Notice: Your ASSI Membership Expired 3 Months Ago` |

---

## 🛡️ Anti-Spam & Idempotency Guarantee

- All sent notifications are tracked in MySQL table **`subscription_notifications`** with a unique key on `(membership_user_id, notification_stage, expiry_date)`.
- Even if the automated cron runs 10 times a day, **each stage notification is sent exactly ONCE** per user per subscription cycle.
- When a user renews and their expiration date advances, the new cycle automatically becomes eligible for future reminders.

---

## 📁 File Structure

| File | Purpose |
| :--- | :--- |
| `subscription_mail_config.php` | Central settings: SMTP host, credentials, test mode flag (`SUBSCRIPTION_LIVE_MODE`), milestone definitions, and security token. |
| `subscription_helper.php` | Core calculation logic: computes expiry date from `lastpaid_date` + `membership_plan`, determines applicable stages, checks duplicate records, and logs activity. |
| `email_templates.php` | Responsive, medical-themed HTML and plain-text email templates with ASSI branding, member details table, dynamic urgency banners, and direct renewal links. |
| `mailer_service.php` | Robust email dispatcher leveraging PHPMailer with TLS/SSL options, timeouts, and detailed error tracking. |
| `send_expiry_reminders.php` | The main CLI and Web cron runner script. |
| `test_subscription_alerts.php` | Interactive browser-based Testing & Control Center to test sample emails, audit the database, run dry-runs, and view history. |
| `run_cron_windows.bat` | Windows batch file for Windows Task Scheduler execution. |
| `subscription_mailer.log` | Auto-generated rolling log of all execution events, errors, and delivery summaries. |

---

## 🧪 How to Test (Safe Mode)

By default, **`SUBSCRIPTION_LIVE_MODE` is set to `false`**. No real members will receive emails until you test and verify.

### 1. Web Testing Portal (Recommended)
Open your browser and navigate to:
```
http://localhost/assi/cron/test_subscription_alerts.php
```
*(or your local virtual host / server domain)*

From this portal, you can:
1. **Send a Sample Email to Your Inbox**: Select any stage (3 Months, 1 Month, 1 Week, 1 Day), enter your email address, and click "Send Sample Email Now". Check your inbox to preview the exact design and deliverability.
2. **Inspect Member Expiry Dates**: View the real-time breakdown of members in your database and see who is nearing expiration.
3. **Run Dry-Run Simulation**: Preview exactly which members would be notified without sending any actual emails.

### 2. Command Line Dry-Run
Run via terminal or PowerShell:
```bash
php C:\xampp\htdocs\assi\cron\send_expiry_reminders.php --mode=dry_run
```

### 3. Command Line Batch Test (Redirected to Your Email)
```bash
php C:\xampp\htdocs\assi\cron\send_expiry_reminders.php --mode=test --test_email=your_email@gmail.com
```

---

## 🚀 How to Make it LIVE

Once you have reviewed the sample emails and are satisfied:

1. Open `cron/subscription_mail_config.php`.
2. Change:
   ```php
   define('SUBSCRIPTION_LIVE_MODE', false);
   ```
   to:
   ```php
   define('SUBSCRIPTION_LIVE_MODE', true);
   ```
3. Save the file. Real members will now receive their reminder when their expiration date enters the respective window.

---

## ⏰ How to Automate Daily (Schedule Setup)

### Option A: Windows Task Scheduler (Local or Windows Server)
1. Press `Win + R`, type `taskschd.msc`, and press Enter.
2. Click **Create Basic Task...**
   - **Name**: `ASSI Subscription Expiry Reminders`
   - **Trigger**: `Daily` at `09:00 AM`
   - **Action**: `Start a program`
   - **Program/script**: `C:\xampp\htdocs\assi\cron\run_cron_windows.bat`
   - **Start in**: `C:\xampp\htdocs\assi\cron\`
3. Click **Finish**.

### Option B: Linux / cPanel Cron Job
In cPanel under **Cron Jobs**, add a new cron job running once daily at 9:00 AM:
```cron
0 9 * * * /usr/local/bin/php /home/username/public_html/cron/send_expiry_reminders.php >/dev/null 2>&1
```

### Option C: Web-Cron (cron-job.org / EasyCron / Webhook)
If using an external HTTP cron service, configure a daily `GET` request to:
```
https://www.assi.in/cron/send_expiry_reminders.php?token=assi_sub_cron_2025_secure&mode=live
```
*(Protected by the secret token defined in `subscription_mail_config.php`)*
