# E-Commerce DB + Secure Auth

Proyek Tugas Rutin 11 mata kuliah Pemrograman Web. Aplikasi ini dikembangkan menggunakan Laravel untuk menerapkan pengelolaan database e-commerce, autentikasi pengguna, otorisasi berbasis role, dan panel administrasi.

## Teknologi

- Laravel 12
- PHP 8.2
- MySQL
- Laravel Breeze (Blade)
- Laravel Eloquent ORM
- Filament 3
- Vite

## Fitur

### 1. Database dan Eloquent
- Tujuh tabel e-commerce: `categories`, `products`, `orders`, `order_items`, `payments`, `carts`, dan `cart_items`.
- Relasi antarmodel menggunakan Eloquent.
- Factory dan seeder untuk menghasilkan minimal 50 data produk.
- Scope `active()` untuk mengambil produk aktif.
- Contoh query menggunakan Laravel Tinker.
- Eager loading menggunakan `with('category')`.

### 2. Autentikasi dan Keamanan
- Register, login, dan logout menggunakan Laravel Breeze.
- Middleware untuk membatasi akses berdasarkan role `admin`, `editor`, dan `user`.
- `PostPolicy` untuk mengatur izin edit dan hapus produk.
- Pengujian akses berdasarkan role pengguna.

### 3. Bonus: Filament Admin Panel
- Panel administrasi di `/admin`.
- Pengelolaan produk dan kategori.
- Form tambah dan edit data.
- Tabel data dengan pencarian, pengurutan, dan filter.

## Struktur Database

| Tabel | Fungsi |
|---|---|
| `users` | Menyimpan data pengguna dan role |
| `categories` | Menyimpan kategori produk |
| `products` | Menyimpan data produk |
| `orders` | Menyimpan transaksi pesanan |
| `order_items` | Menyimpan detail produk dalam pesanan |
| `payments` | Menyimpan informasi pembayaran |
| `carts` | Menyimpan keranjang pengguna |
| `cart_items` | Menyimpan produk dalam keranjang |

## Persyaratan

- PHP 8.2 atau lebih baru
- Composer
- Node.js dan npm
- MySQL atau MariaDB

## Cara Menjalankan

1. Clone repository ini.
2. Masuk ke direktori proyek.
3. Instal dependensi PHP:

   ```bash
   composer install
   ```

4. Salin `.env.example` menjadi `.env`, kemudian sesuaikan konfigurasi database.

   ```bash
   cp .env.example .env
   ```

   Pada Windows, file tersebut juga dapat disalin secara manual melalui File Explorer.

5. Buat database bernama `laravel_p11` di MySQL.
6. Generate application key:

   ```bash
   php artisan key:generate
   ```

7. Jalankan migrasi dan seeder:

   ```bash
   php artisan migrate --seed
   ```

8. Instal dependensi frontend dan build aset:

   ```bash
   npm install
   npm run build
   ```

9. Jalankan server:

   ```bash
   php artisan serve
   ```

10. Buka `http://127.0.0.1:8000` di browser.

## Akses Aplikasi

- Aplikasi: `http://127.0.0.1:8000`
- Login: `/login`
- Register: `/register`
- Panel Filament: `/admin`
- Pengujian akses admin: `/admin-area`
- Pengujian akses editor: `/editor-area`
- Pengujian akses user: `/user-area`

Akun pengguna perlu dibuat dan role-nya dikonfigurasi sesuai kebutuhan pengujian. Jangan menyimpan password asli atau file `.env` di repository.

## Catatan

Proyek ini dibuat untuk keperluan pembelajaran Pemrograman Web. Query Tinker, pengujian autentikasi, pembatasan akses, serta panel administrasi dapat digunakan sebagai bahan demonstrasi dan dokumentasi tugas.