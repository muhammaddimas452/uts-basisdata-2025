# UTS BASIS DATA SISTEM RUMAH SAKIT

Sebuah aplikasi web berbasis Laravel untuk mengelola data operasional rumah sakit, termasuk manajemen pasien, dokter, jadwal, dan rekam medis elektronik (RME) sederhana.

---

## 1. Struktur Database (ERD)

Desain database mengikuti alur operasional rumah sakit. Gambar ERD di bawah ini menunjukkan relasi antar tabel utama.

![ERD Sistem Rumah Sakit](img/erd.png)

---

## 2. Table Rumah Sakit

## A. Migration: Struktur Database
**File:** `database/migrations/xxxx_xx_xx_create_rumah_sakits_table.php`

```bash
            $table->id();
            $table->string('kode_rs', 20)->unique();
            $table->string('nama_rs');
            $table->text('alamat');
            $table->string('kota', 100);
            $table->string('provinsi', 100);
            $table->string('telepon', 20);
            $table->string('email')->nullable();
            $table->enum('status', ['aktif','nonaktif'])->default('aktif');
            $table->enum('tipe_rs', ['A','B', 'C'])->default('C');
            $table->timestamps();
```

## B. Model: Logika Aplikasi
**File:** `app/Models/RumahSakit.php`

Model ini bertugas sebagai jembatan antara aplikasi Laravel dengan tabel `rumah_sakits`.

```bash
class RumahSakit extends Model
{
    use HasFactory;
    
    // Mass Assignment Protection
    protected $guarded = ['id'];
}
```
---

## 3. Table Poliklinik

## A. Migration: Struktur Database
**File:** `database/migrations/xxxx_xx_xx_create_polikliniks_table.php`

```bash
            $table->id();
            $table->foreignIdFor(RumahSakit::class)->constrained()
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_poli');
            $table->text('deskripsi')->nullable();
            $table->string('kode_poli', 20)->unique();
            $table->string('lokasi')->nullable();
            $table->time('jam_buka')->default('08:00:00');
            $table->time('jam_tutup')->default('16:00:00');
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->timestamps();
```

## B. Model: Logika Aplikasi
**File:** `app/Models/Poliklinik.php`

Model ini bertugas sebagai jembatan antara aplikasi Laravel dengan tabel `polikliniks`.

```bash
class Poliklinik extends Model
{
    protected $guarded = ['id'];

    public function rumahSakit()
    {
        return $this->belongsTo(RumahSakit::class);
    }
}
```
---

## 4. Table Pasien

## A. Migration: Struktur Database
**File:** `database/migrations/xxxx_xx_xx_create_pasiens_table.php`

```bash
             $table->id();
            $table->string('no_rm', 20)->unique()->comment('Nomor Rekam Medis');
            $table->string('nik', 16)->unique()->comment('Nomor KTP');
            $table->string('nama_lengkap');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->string('kota', 100);
            $table->string('provinsi', 100);
            $table->string('telepon', 20);
            $table->string('email')->nullable();
            $table->enum('golongan_darah', ['A','B','O', 'AB']);
            $table->string('pekerjaan', 100);
            $table->enum('status_pernikahan', ['Belum Menikah', 'Menikah']);
            $table->timestamps();
```

## B. Model: Logika Aplikasi
**File:** `app/Models/Pasien.php`

Model ini bertugas sebagai jembatan antara aplikasi Laravel dengan tabel `pasiens`.

```bash
class Pasien extends Model
{
    protected $guarded = ['id'];
}
```
---

## 5. Table Dokter

## A. Migration: Struktur Database
**File:** `database/migrations/xxxx_xx_xx_create_dokters_table.php`

```bash
            $table->id();
            $table->foreignIdFor(RumahSakit::class)->constrained();
            $table->foreignIdFor(Poliklinik::class)->constrained();
            $table->string('kode_dokter', 20)->unique();
            $table->string('nip');
            $table->string('str')->comment('Surat Tanda Registrasi Dokter');
            $table->string('nama_lengkap');
            $table->string('spesialisasi');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->string('kota', 100);
            $table->string('provinsi', 100);
            $table->string('telepon', 20);
            $table->string('email')->nullable();
            $table->enum('golongan_darah', ['A','B','O', 'AB']);
            $table->string('pekerjaan', 100);
            $table->enum('status_pernikahan', ['Belum Menikah', 'Menikah']);
            $table->timestamps();
```

## B. Model: Logika Aplikasi
**File:** `app/Models/Dokter.php`

Model ini bertugas sebagai jembatan antara aplikasi Laravel dengan tabel `dokters`.

```bash
class Dokter extends Model
{
    protected $guarded = ['id'];

    public function rumahSakit()
    {
        return $this->belongsTo(RumahSakit::class);
    }

    public function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class);
    }
}
```
---

## 6. Table Obat

## A. Migration: Struktur Database
**File:** `database/migrations/xxxx_xx_xx_create_obats_table.php`

```bash
            $table->id();
            // 2. Relasi ke Rumah Sakit (karena stok/harga milik RS)
            $table->foreignIdFor(RumahSakit::class)->constrained()
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->string('kode_obat', 20)->comment('Kode internal obat/SKU');
            $table->string('nama_obat');
            $table->string('produsen')->nullable()->comment('Pabrik pembuat obat');
            $table->text('deskripsi')->nullable();
            $table->enum('kategori', [
                'Antibiotik', 
                'Analgesik', 
                'Antasida', 
                'Vitamin', 
                'Obat Keras', 
                'Obat Bebas'
            ])->default('Obat Bebas');
            $table->enum('bentuk_sediaan', [
                'Tablet', 
                'Kapsul', 
                'Sirup', 
                'Salep', 
                'Injeksi',
                'Lainnya'
            ])->default('Tablet');
            $table->string('dosis', 50)->nullable()->comment('Cth: 500mg, 10mg/5ml');
            // Kolom Inventaris
            $table->unsignedInteger('stok')->default(0);
            $table->decimal('harga', 10, 2)->default(0); // 10 digit total, 2 di belakang koma
            $table->boolean('perlu_resep')->default(true);
            $table->timestamps();
            // 3. Membuat kode_obat unik HANYA dalam satu RS yang sama
            $table->unique(['rumah_sakit_id', 'kode_obat']);
```

## B. Model: Logika Aplikasi
**File:** `app/Models/Obat.php`

Model ini bertugas sebagai jembatan antara aplikasi Laravel dengan tabel `obats`.

```bash
class Obat extends Model
{
    protected $guarded = ['id'];

    public function rumahSakit()
    {
        return $this->belongsTo(RumahSakit::class);
    }
}
```
---

## 7. Table Jadwal Praktek

## A. Migration: Struktur Database
**File:** `database/migrations/xxxx_xx_xx_create_jadwal_prakteks_table.php`

```bash
            $table->id();
            // === RELASI UTAMA ===
            $table->foreignIdFor(Dokter::class)->constrained()
                  ->onUpdate('cascade')->onDelete('cascade');
            // Relasi ke Poliklinik (DIMANA prakteknya)
            $table->foreignIdFor(Poliklinik::class)->constrained()
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->enum('hari', [
                'Senin', 
                'Selasa', 
                'Rabu', 
                'Kamis', 
                'Jumat', 
                'Sabtu', 
                'Minggu'
            ]);
            
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->unsignedInteger('kuota')->default(20)
                  ->comment('Jumlah maksimal pasien per sesi jadwal');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif')
                  ->comment('Untuk menandai jika dokter cuti, dll');
            $table->text('keterangan')->nullable()
                  ->comment('Cth: Hanya pasien rujukan, Khusus lansia');
            $table->timestamps();
            // 4. Mencegah jadwal duplikat untuk dokter yang sama
            // di hari dan jam yang sama persis
            $table->unique(['dokter_id', 'hari', 'jam_mulai']);
```

## B. Model: Logika Aplikasi
**File:** `app/Models/JadwalPraktek.php`

Model ini bertugas sebagai jembatan antara aplikasi Laravel dengan tabel `jadwal_prakteks`.

```bash
class JadwalPraktek extends Model
{
    protected $guarded = ['id'];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class);
    }
}
```
---

## 8. Table Kunjungan

## A. Migration: Struktur Database
**File:** `database/migrations/xxxx_xx_xx_create_kunjungans_table.php`

```bash
            $table->id();
            // === RELASI UTAMA ===
            $table->foreignIdFor(Pasien::class)->constrained()
                  ->onUpdate('cascade')->onDelete('restrict');
            $table->foreignIdFor(Dokter::class)->constrained()
                  ->onUpdate('cascade')->onDelete('restrict');
            $table->dateTime('tanggal_kunjungan')->comment('Tanggal dan jam kunjungan'); 
            $table->enum('status', [
                'Dijadwalkan', 
                'Selesai',    
                'Dibatalkan' 
            ])->default('Dijadwalkan');
            $table->text('keluhan')->comment('Keluhan utama pasien');
            $table->text('diagnosis')->nullable()->comment('Hasil pemeriksaan dokter');          
            $table->text('catatan_resep')->nullable()
                  ->comment('Resep obat atau catatan lainnya');
            $table->timestamps();
```

## B. Model: Logika Aplikasi
**File:** `app/Models/Kunjungan.php`

Model ini bertugas sebagai jembatan antara aplikasi Laravel dengan tabel `kunjungans`.

```bash
class Kunjungan extends Model
{
    protected $guarded = ['id'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
    /**
     * Get the dokter that owns the Kunjungan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}
```
---

## 9. Table Resep

## A. Migration: Struktur Database
**File:** `database/migrations/xxxx_xx_xx_create_reseps_table.php`

```bash
            $table->id();
            // === RELASI UTAMA ===
            $table->foreignIdFor(Kunjungan::class)->constrained()
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(Obat::class)->constrained()
                  ->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedInteger('jumlah')->default(1)
                  ->comment('Jumlah obat, cth: 10 (tablet), 1 (botol)');
            $table->string('aturan_pakai', 100)
                  ->comment('Cth: 3x1 Sesudah Makan');
            $table->text('keterangan')->nullable()
                  ->comment('Cth: Habiskan, Jika perlu');
            $table->timestamps();
```

## B. Model: Logika Aplikasi
**File:** `app/Models/Resep.php`

Model ini bertugas sebagai jembatan antara aplikasi Laravel dengan tabel `reseps`.

```bash
class Resep extends Model
{
    protected $guarded = ['id'];

    /**
     * Get the kunjungan that owns the Resep
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kunjungan(): BelongsTo
    {
        return $this->belongsTo(Kunjungan::class);
    }

    /**
     * Get the obat that owns the Resep
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function obat(): BelongsTo
    {
        return $this->belongsTo(Obat::class);
    }
}
```
---

## 2. Database Seeder

Proyek ini dilengkapi dengan seeder untuk data dummy. Perintah `dci` akan menjalankan `DatabaseSeeder` yang memanggil seeder berikut **secara berurutan**:

1.  **RumahSakitSeeder**: Mengisi 5 data rumah sakit.
2.  **PoliklinikSeeder**: Mengisi 5 data poliklinik (terhubung ke RS).
3.  **PasienSeeder**: Mengisi 5 data pasien.
4.  **DokterSeeder**: Mengisi 5 data dokter (terhubung ke RS & Poli).
5.  **ObatSeeder**: Mengisi 5 data obat (terhubung ke RS).
6.  **JadwalPraktekSeeder**: Mengisi 5 data jadwal (terhubung ke Dokter & Poli).
7.  **KunjunganSeeder**: Mengisi 5 data kunjungan (terhubung ke Pasien & Dokter).
8.  **ResepSeeder**: Mengisi 5 data resep (terhubung ke Kunjungan & Obat).

---
