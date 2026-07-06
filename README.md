# DO-RYT Machine Corp - Corporate CMS

![DO-RYT Corporate CMS](public/img/hero_bg.png)

This is the enterprise-grade corporate website and CMS for DO-RYT Machine Corp, a premier manufacturer of industrial processing machinery.

Built with performance, SEO, and extreme visual polish in mind.

## 🚀 Tech Stack

- **Backend:** Laravel 13, PHP 8.4, MySQL 8
- **Frontend:** Laravel Blade, Tailwind CSS v4, AlpineJS
- **CMS (Admin):** Filament v4
- **Animation/Scroll:** GSAP, Lenis, Splide
- **Build Tool:** Vite

## 📁 Architecture & Folder Structure

The application strictly adheres to modern Laravel architecture, using the streamlined directory structure introduced in Laravel 11/12.

- `app/Http/Controllers` - HTTP Request handling. Eager loading is utilized heavily to prevent N+1 queries.
- `app/Models` - Eloquent Models with strict typing (`declare(strict_types=1);`).
- `app/Enums` - PHP Enums for status, setting types, and media collections.
- `app/Filament` - Admin panel resources, custom fields, and dashboards.
- `bootstrap/app.php` - Global middleware configuration (e.g. `SecurityHeaders`).
- `resources/views` - Blade templates, strongly abstracted into reusable `components/`.
- `resources/js` - Native JavaScript leveraging GSAP ScrollTrigger and Lenis smooth scrolling.

## 🔒 Security

- Comprehensive `SecurityHeaders` middleware.
- CSRF protection across all forms.
- Rate-limited POST endpoints (`throttle:5,1`).
- Filament endpoints protected by strict Auth policies.

## 🎨 Design System

The visual identity is defined primarily via Tailwind CSS v4 variables in `resources/css/app.css`.
The color palette relies on `primary` (accent orange) and `steel` (industrial grey) to reflect the premium engineering brand.

## 📦 Local Development

1. **Clone the repository.**
2. **Install dependencies:**
   ```bash
   composer install
   npm install
   ```
3. **Environment Setup:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. **Database & Storage:**
   ```bash
   php artisan migrate:fresh --seed
   php artisan storage:link
   ```
5. **Asset Compilation:**
   ```bash
   npm run dev
   ```

## 📚 CMS Administration

The Filament Admin Panel is available at `/admin`.
Administrators can manage:
- **Products & Industries** (Many-to-Many relationships)
- **Blog Posts & Categories**
- **Testimonials & Gallery Items**
- **Inquiries & Contact Messages**
- **Global Site Settings & SEO Metadata**
