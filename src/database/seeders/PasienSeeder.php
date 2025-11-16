<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'no_rm' => 'RM-25001',
                'nik' => '3216011005850001', // Contoh NIK (16 digit)
                'nama_lengkap' => 'Budi Santoso',
                'tanggal_lahir' => '1985-05-10',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Mawar Melati No. 12, Bekasi Timur',
                'kota' => 'Bekasi',
                'provinsi' => 'Jawa Barat',
                'telepon' => '081234567890',
                'email' => 'budi.santoso@example.com',
                'golongan_darah' => 'O',
                'pekerjaan' => 'Karyawan Swasta',
                'status_pernikahan' => 'Menikah',
            ],
            [
                'no_rm' => 'RM-25002',
                'nik' => '3216022011980002', // Contoh NIK (16 digit)
                'nama_lengkap' => 'Siti Aminah',
                'tanggal_lahir' => '1998-11-20',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Kenanga Indah No. 15, Cilandak',
                'kota' => 'Jakarta Selatan',
                'provinsi' => 'DKI Jakarta',
                'telepon' => '081345678901',
                'email' => 'siti.aminah@example.com',
                'golongan_darah' => 'A',
                'pekerjaan' => 'Mahasiswa',
                'status_pernikahan' => 'Belum Menikah',
            ],
            [
                'no_rm' => 'RM-25003',
                'nik' => '3216033001900003', // Contoh NIK (16 digit)
                'nama_lengkap' => 'Agus Wijaya',
                'tanggal_lahir' => '1990-01-30',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Flamboyan No. 8, Rungkut',
                'kota' => 'Surabaya',
                'provinsi' => 'Jawa Timur',
                'telepon' => '081567890123',
                'email' => 'agus.wijaya@example.com',
                'golongan_darah' => 'B',
                'pekerjaan' => 'Wiraswasta',
                'status_pernikahan' => 'Menikah',
            ],
            [
                'no_rm' => 'RM-25004',
                'nik' => '3216041507880004', // Contoh NIK (16 digit)
                'nama_lengkap' => 'Dewi Lestari',
                'tanggal_lahir' => '1988-07-15',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Anggrek Bulan No. 42, Medan Baru',
                'kota' => 'Medan',
                'provinsi' => 'Sumatera Utara',
                'telepon' => '081789012345',
                'email' => 'dewi.lestari@example.com',
                'golongan_darah' => 'AB',
                'pekerjaan' => 'Ibu Rumah Tangga',
                'status_pernikahan' => 'Menikah',
            ],
            [
                'no_rm' => 'RM-25005',
                'nik' => '3216052503010005', // Contoh NIK (16 digit)
                'nama_lengkap' => 'Rian Hidayat',
                'tanggal_lahir' => '2001-03-25',
                'jenis_kelamin' => 'L',
                'alamat' => 'Perum Griya Indah Blok C1/10, Depok',
                'kota' => 'Yogyakarta',
                'provinsi' => 'DI Yogyakarta',
                'telepon' => '081901234567',
                'email' => 'rian.hidayat@example.com',
                'golongan_darah' => 'A',
                'pekerjaan' => 'Programmer',
                'status_pernikahan' => 'Belum Menikah',
            ],
        ];
        foreach ($data as $pasien){
            Pasien::firstOrCreate($pasien);
        }
    }
}
