# DO-RYT Corporate CMS - Production Deployment Guide

This document outlines the final steps to deploy the DO-RYT Machine Corp website to a production environment (e.g., Laravel Forge, Envoyer, or Laravel Cloud).

## Server Requirements
- PHP 8.4+
- MySQL 8.0+ / MariaDB 11.0+
- Nginx or Apache
- Node.js 20+ (for build step)

## Deployment Checklist

- [ ] **SSL Configuration**: Ensure an active SSL certificate (Let's Encrypt).
- [ ] **PHP Extensions**: Verify `intl`, `mbstring`, `pdo_mysql`, `gd`, `zip`, `xml`, and `bcmath` are installed.
- [ ] **Environment Setup**:
  - `APP_ENV=production`
  - `APP_DEBUG=false`
  - `APP_URL=https://doryt.com`
  - Ensure standard DB credentials are set.
- [ ] **File Permissions**:
  - `storage` and `bootstrap/cache` must be writable by the web server daemon.
- [ ] **Artisan Optimization**:
  ```bash
  php artisan config:cache
  php artisan route:cache
  php artisan view:cache
  php artisan event:cache
  php artisan filament:cache-components
  ```
- [ ] **Database Setup**:
  ```bash
  php artisan migrate --force
  ```
  *(Note: Do NOT run seeders in production unless initializing the first admin account).*
- [ ] **Storage Link**:
  ```bash
  php artisan storage:link
  ```
- [ ] **Frontend Build**:
  ```bash
  npm install
  npm run build
  ```
- [ ] **Cron Scheduler**:
  Add the following Cron entry to run every minute to handle scheduled tasks (backups, cleanup):
  ```bash
  * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
  ```
- [ ] **Email & External Services**:
  - Configure `MAIL_MAILER` (e.g., Resend, Postmark, SES).
  - Test contact form and inquiry form routing.

## Backup Strategy

The application includes backup scripts (or use Spatie Laravel Backup if installed). 
Schedule automated database dumps via the Artisan scheduler in `routes/console.php` or using your hosting provider's automated snapshot utility.

## Maintenance & Updates

- **Updating Composer dependencies:**
  ```bash
  composer update --no-dev -a
  ```
- **Clearing Application Caches (Troubleshooting):**
  ```bash
  php artisan optimize:clear
  ```
- **Updating Filament Panels:**
  When making changes to resources, remember to clear cached filament components:
  ```bash
  php artisan filament:clear-cached-components
  ```
