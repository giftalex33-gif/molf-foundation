MOLF FOUNDATION WEBSITE — PHP + MYSQL BACKEND
============================================
Includes: public website pages, server-side form handling, MySQL schema, admin login/dashboard, status tracking and CSV export.

REQUIREMENTS
- PHP 8.1+ with PDO MySQL enabled
- MySQL or MariaDB (XAMPP is an easy local option)
- Run through Apache/PHP; do not double-click PHP files.

RUN LOCALLY WITH XAMPP
1. Extract the ZIP into C:\xampp\htdocs\MOLF_website (or your XAMPP htdocs folder).
2. Start Apache and MySQL from the XAMPP Control Panel.
3. Open http://localhost/phpmyadmin in your browser.
4. Use Import to import database/schema.sql. It creates the molf_foundation database and tables.
5. Open Command Prompt and run:
   cd C:\xampp\htdocs\MOLF_website
   C:\xampp\php\php.exe setup_admin.php admin@example.com "ReplaceThisWithAStrongPassword"
   Use your own email and a unique password of at least 12 characters.
6. Open http://localhost/MOLF_website/ to browse the site.
7. Open http://localhost/MOLF_website/admin/login.php to sign in.
8. Submit a test from Contact, Volunteer, Register, or Donate. Confirm it appears in the dashboard.

DATABASE SETTINGS
Defaults in config/config.php are host 127.0.0.1, database molf_foundation, user root, blank password (common local XAMPP defaults). Update these for your setup or set MOLF_DB_HOST, MOLF_DB_NAME, MOLF_DB_USER and MOLF_DB_PASS environment variables.

WHAT THE BACKEND DOES
- Stores contact messages, volunteer applications, registration interests and donation enquiries in MySQL.
- Admin login uses PHP password_hash/password_verify; setup_admin.php only runs from CLI.
- Dashboard filters submissions and changes status (New / In progress / Resolved).
- Export CSV downloads the stored submissions.
- Prepared statements, output escaping and CSRF tokens are used for database writes/admin actions.

IMPORTANT BEFORE PUBLIC DEPLOYMENT
- Replace sample contact details and confirm all organization copy, images, consent/privacy text and policies.
- Donation page records a donation enquiry only. It does NOT process payments. Add a verified payment provider and webhook if online donations are needed.
- Use HTTPS, strong unique admin credentials, secure hosting/database credentials, backups and a privacy notice before accepting real personal data.
- This is a practical starter backend for a project submission, not a security audit or a hosted live deployment.
