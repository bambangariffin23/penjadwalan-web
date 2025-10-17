<img width="959" height="449" alt="editschedule" src="https://github.com/user-attachments/assets/c6ebd6ac-5bbb-4775-b6a6-38214796c412" /># 🗓️ Penjadwalan — Laravel 12 App

Aplikasi web sederhana untuk **mengelola jadwal** dengan fitur autentikasi (login/register), **CRUD Jadwal**, **Kategori**, dan **Dashboard**. Dibangun dengan **Laravel 12 (PHP ≥ 8.2)** dan Vite.

---

## ✨ Fitur Utama
- 🔐 Autentikasi: Login, Register, Logout
- 👤 Role dasar: admin (seed default)
- 📅 CRUD **Jadwal** (`judul`, `tanggal`, `waktu`, `kategori`, `deskripsi`)
- 🏷️ CRUD **Kategori** (`nama_kategori`)
- 🧭 Dashboard & layout dengan Bootstrap (via CDN)
- 🔗 Relasi: Jadwal ↔️ User, Jadwal ↔️ Category (opsional)

> Catatan: tampilan menggunakan Bootstrap CDN, sehingga **npm/vite opsional** kecuali kamu menambahkan asset tambahan.

---

## 🎥 Demo Aplikasi

### 🖥 Form Login
<img width="248" height="203" alt="login" src="https://github.com/user-attachments/assets/6bc57f4d-86ce-4541-bccb-b2595d267bbd" />


### 📝 Form Register
<img width="313" height="299" alt="register" src="https://github.com/user-attachments/assets/bca023f0-181b-4ddc-a21f-84c362a33701" />


### 📝 Dashboard
<img width="958" height="449" alt="dashboard" src="https://github.com/user-attachments/assets/88ab8be1-ded2-40b3-a344-8a80d33fe285" />


### 📝 Form Jadwal
<img width="959" height="449" alt="editschedule" src="https://github.com/user-attachments/assets/38ed1d61-be8f-4e76-a222-c40458c2300e" />


### 📝 Form Tambah Jadwal
<img width="956" height="436" alt="tambahjadwal" src="https://github.com/user-attachments/assets/f853f494-f7d3-48d3-a3bc-0f9a9f577d73" />


### 📝 Form Edit Jadwal
<img width="959" height="449" alt="editschedule" src="https://github.com/user-attachments/assets/c4692405-e324-4e1e-adcc-9f14360f784c" />


### 📝 Form Kategori
<img width="955" height="449" alt="category" src="https://github.com/user-attachments/assets/6781d5aa-74ea-4fdd-94eb-ec90c48a80ae" />


### 📝 Form Tambah Kategori
<img width="953" height="449" alt="tambahkategori" src="https://github.com/user-attachments/assets/275637fa-094b-45bb-aaeb-6fe8162ea8b9" />


### 📝 Form Edit Kategori
<img width="958" height="452" alt="editkategori" src="https://github.com/user-attachments/assets/788be49c-b2a1-44f1-ab73-cac9dfe08013" />









## 🧰 Teknologi
- **Laravel**: 12.x
- **PHP**: 8.2+
- **Composer**
- **Database**: MySQL
- **Vite** (opsional) untuk asset pipeline

---

## 🗂️ Struktur Penting
```
Penjadwalan/
├─ app/
│  ├─ Http/Controllers/
│  │  ├─ AuthController.php
│  │  ├─ DashboardController.php
│  │  ├─ ScheduleController.php
│  │  └─ CategoryController.php
│  └─ Models/
│     ├─ Schedule.php
│     ├─ Category.php
│     └─ User.php
├─ database/
│  ├─ migrations/
│  │  ├─ 2025_10_15_132705_create_categories_table.php
│  │  └─ 2025_10_15_132719_create_schedules_table.php
│  └─ seeders/
│     ├─ AdminSeeder.php
│     └─ DatabaseSeeder.php
├─ resources/views/
│  ├─ auth/{login.blade.php, register.blade.php}
│  ├─ schedules/{index, create, edit}.blade.php
│  ├─ categories/{index, create, edit}.blade.php
│  └─ layouts/{app, admin, header, sidebar, footer}.blade.php
├─ routes/web.php
├─ composer.json
├─ package.json
└─ vite.config.js
```

---

## 🚀 Persiapan & Instalasi

### 1) Clone & masuk folder
```bash
git clone <URL_REPO_KAMU> penjadwalan
cd penjadwalan/Penjadwalan
```

### 2) Instal dependensi PHP
```bash
composer install
```

### 3) Konfigurasi environment
Salin file contoh dan sesuaikan koneksi database:
```bash
cp .env.example .env
php artisan key:generate
```
Edit `.env` pada bagian database:
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=penjadwalan
DB_USERNAME=root
DB_PASSWORD=
```

> **Opsional (Session table):** Jika `SESSION_DRIVER=database`, jalankan:
```bash
php artisan session:table
```

### 4) Migrasi & Seeder
```bash
php artisan migrate
php artisan db:seed --class=AdminSeeder
```
Seeder akan membuat akun admin default:
- Email: **admin@example.com**
- Password: **admin123**

*(Kamu bisa mengubahnya setelah login.)*

### 5) Jalankan server lokal
```bash
php artisan serve
```
Buka: `http://127.0.0.1:8000`

> Halaman utama mengarah ke **form login** (`/login`).  
> Setelah login, akses **/dashboard** untuk melihat menu.

---

## 🔧 Menjalankan Vite (opsional)
Karena tampilan memakai Bootstrap CDN, langkah ini hanya perlu jika kamu menambah asset custom.

```bash
# Instal dependency front-end
npm install

# Mode pengembangan
npm run dev

# Build produksi
npm run build
```

---

## 📘 Rute Penting
```php
// routes/web.php (ringkasan)
GET  /               -> AuthController@loginForm (alias: login)
GET  /login          -> AuthController@loginForm
POST /login          -> AuthController@login
GET  /register       -> AuthController@registerForm
POST /register       -> AuthController@register
POST /logout         -> AuthController@logout

// Dilindungi middleware auth
GET  /dashboard      -> DashboardController@index
RES  /schedules      -> ScheduleController (index, create, store, edit, update, destroy)
RES  /categories     -> CategoryController (index, create, store, edit, update, destroy)
```

---

## 🗄️ Skema Tabel

**categories**
- `id` (PK)
- `nama_kategori` (index, nullable)
- `timestamps`

**schedules**
- `id` (PK)
- `judul` (string, required)
- `tanggal` (date)
- `waktu` (time)
- `kategori` (string, nullable) _*catatan: ada juga relasi ke Category via `category_id` di model — pastikan field ini tersedia jika ingin pakai relasi tersebut*_
- `deskripsi` (text, nullable)
- `timestamps`

> **Relasi di Model**
> - `Schedule::user()` → `belongsTo(User::class)`  
> - `Schedule::category()` → `belongsTo(Category::class, 'category_id')`  
>   Jika ingin memanfaatkan relasi ini penuh, tambahkan kolom `category_id` pada tabel `schedules` atau sesuaikan field yang dipakai.

---

## 🧪 Pengujian
```bash
php artisan test
```
Tambahkan test kamu di folder `tests/`.

---





