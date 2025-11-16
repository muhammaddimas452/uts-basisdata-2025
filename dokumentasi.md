# Sistem Informasi Manajemen Rumah Sakit (SIMRS) - [Nama Proyek Anda]

Sebuah aplikasi web berbasis Laravel untuk mengelola data operasional rumah sakit, termasuk manajemen pasien, dokter, jadwal, dan rekam medis elektronik (RME) sederhana.

---

## 1. Prasyarat (Prerequisites)

Pastikan lingkungan lokal Anda memenuhi persyaratan berikut sebelum instalasi:

* PHP >= 8.1
* Composer
* Database (cth: MySQL, PostgreSQL)
* Node.js & NPM (Opsional, untuk frontend)

---

## 2. Cara Instalasi

1.  **Clone Repositori**
    ```bash
    git clone [URL_GIT_ANDA]
    cd [nama-proyek]
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    ```

3.  **Buat File Environment**
    Salin file `.env.example` menjadi `.env`.
    ```bash
    cp .env.example .env
    ```

4.  **Generate Key Aplikasi**
    ```bash
    php artisan key:generate
    ```

5.  **Konfigurasi Database**
    Buka file `.env` dan sesuaikan koneksi database Anda:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_db_anda
    DB_USERNAME=root
    DB_PASSWORD=password_anda
    ```

6.  **Migrasi dan Seeding Database**
    Perintah ini akan membuat semua tabel dan mengisinya dengan data dummy yang sudah disiapkan.
    ```bash
    php artisan migrate:fresh --seed
    ```

7.  **Jalankan Server**
    ```bash
    php artisan serve
    ```

Buka `http://127.0.0.1:8000` di browser Anda.

---

## 3. Struktur Database (ERD)

Desain database mengikuti alur operasional rumah sakit. Gambar ERD di bawah ini menunjukkan relasi antar tabel utama.

* (Catatan: Letakkan file gambar ERD Anda, misalnya `Screenshot 2025-11-16 203501.png`, ke dalam folder proyek, lalu ganti `path/to/erd.png` di bawah ini)

![ERD Sistem Rumah Sakit](path/to/erd.png)

---

## 4. Database Seeder

Proyek ini dilengkapi dengan seeder untuk data dummy. Perintah `php artisan migrate:fresh --seed` akan menjalankan `DatabaseSeeder` yang memanggil seeder berikut **secara berurutan**:

1.  **RumahSakitSeeder**: Mengisi 5 data rumah sakit.
2.  **PoliklinikSeeder**: Mengisi 5 data poliklinik (terhubung ke RS).
3.  **PasienSeeder**: Mengisi 5 data pasien.
4.  **DokterSeeder**: Mengisi 5 data dokter (terhubung ke RS & Poli).
5.  **ObatSeeder**: Mengisi 5 data obat (terhubung ke RS).
6.  **JadwalPraktekSeeder**: Mengisi 5 data jadwal (terhubung ke Dokter & Poli).
7.  **KunjunganSeeder**: Mengisi 5 data kunjungan (terhubung ke Pasien & Dokter).
8.  **ResepSeeder**: Mengisi 5 data resep (terhubung ke Kunjungan & Obat).

---

## 5. (Opsional) Perintah Penting Lainnya

* **Menjalankan migrasi saja (tanpa data dummy):**
    ```bash
    php artisan migrate
    ```

* **Menjalankan seeder secara spesifik:**
    ```bash
    php artisan db:seed --class=PasienSeeder
    ```