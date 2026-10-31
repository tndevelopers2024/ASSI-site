@echo off
REM ====================================================================
REM ASSI Automated Subscription Expiry Reminder - Windows Batch Script
REM ====================================================================

REM Set working directory to project root
cd /d "%~dp0"

REM Detect PHP executable
set PHP_BIN=php
if exist "C:\xampp\php\php.exe" (
    set PHP_BIN=C:\xampp\php\php.exe
)

echo [%date% %time%] Starting ASSI Subscription Expiry Notification Runner...
"%PHP_BIN%" "%~dp0send_expiry_reminders.php"

echo [%date% %time%] Process finished with code %ERRORLEVEL%.
REM Uncomment the line below if you want the console window to stay open when double-clicked
REM pause
