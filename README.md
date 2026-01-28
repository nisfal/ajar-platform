# Ajar Platform

Platform edukasi online untuk belajar coding dengan mentor terbaik. Dibangun dengan Laravel 11, Blade, Alpine.js, dan TailwindCSS.

## ✨ Fitur

- 🔐 **Autentikasi** - Register, login, dan manajemen profil
- 📚 **Katalog Kursus** - Daftar kursus dengan filter dan pagination
- 🛒 **Checkout** - Pembelian kursus dengan transfer bank
- 📄 **Upload Bukti Pembayaran** - Verifikasi pembayaran manual
- 🎓 **Classroom** - Interface belajar dengan video player
- 👨‍💼 **Admin Panel** - Verifikasi pembayaran dan manajemen order

## 🛠️ Tech Stack

- **Backend:** Laravel 11
- **Frontend:** Blade + Alpine.js
- **Styling:** TailwindCSS
- **Database:** MySQL

## 📋 Requirements

- PHP 8.1+
- Composer
- Node.js & NPM
- MySQL

## 🚀 Instalasi

```bash
# Clone repository
git clone https://github.com/nisfal/ajar-platform.git
cd ajar-platform

# Install PHP dependencies
composer install

# Install Node dependencies & build assets
npm install
npm run build

# Setup environment
cp .env.example .env
php artisan key:generate

# Konfigurasi database di .env
# DB_DATABASE=ajar_platform
# DB_USERNAME=root
# DB_PASSWORD=

# Jalankan migrasi & seeder
php artisan migrate --seed

# Jalankan server
php artisan serve
```

## 👤 Akun Demo

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@ajar.com | password |
| Student | user@example.com | password |

## 📁 Struktur Proyek

```
ajar-platform/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php
│   │   ├── CourseController.php
│   │   ├── CheckoutController.php
│   │   ├── OrderController.php
│   │   ├── LearningController.php
│   │   └── Admin/OrderController.php
│   └── Models/
│       ├── User.php
│       ├── Course.php
│       ├── CourseChapter.php
│       └── Order.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/views/
│   ├── home.blade.php
│   ├── courses/
│   ├── checkout/
│   ├── orders/
│   ├── learning/
│   └── admin/
└── routes/web.php
```

## 🌐 Deploy ke Shared Hosting

1. Build assets lokal: `npm run build`
2. Upload semua file ke hosting (termasuk `public/build/`)
3. Setup database MySQL di cPanel
4. Update `.env` dengan kredensial database
5. Jalankan: `php artisan migrate --seed`

## 📝 License

MIT License

## 👨‍💻 Author

[nisfal](https://github.com/nisfal)
