<?php

namespace Database\Seeders;

use App\Models\RumahSakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RumahSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode_rs' => 'RS001',
                'nama_rs' => 'RS Harapan Bunda',
                'alamat' => 'Jl. Merdeka No. 10, Cihampelas',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'telepon' => '022-123456',
                'email' => 'info@rshb.com',
                'status' => 'aktif',
                'tipe_rs' => 'B',
            ],
            [
                'kode_rs' => 'RS002',
                'nama_rs' => 'RS Sentosa Jaya',
                'alamat' => 'Jl. Sudirman No. 55, Kebayoran',
                'kota' => 'Jakarta Selatan',
                'provinsi' => 'DKI Jakarta',
                'telepon' => '021-654321',
                'email' => 'kontak@rssj.com',
                'status' => 'aktif',
                'tipe_rs' => 'A',
            ],
            [
                'kode_rs' => 'RS003',
                'nama_rs' => 'RS Mitra Keluarga',
                'alamat' => 'Jl. A. Yani No. 123, Gayungan',
                'kota' => 'Surabaya',
                'provinsi' => 'Jawa Timur',
                'telepon' => '031-789012',
                'email' => 'cs@mitrakeluarga.co.id',
                'status' => 'aktif',
                'tipe_rs' => 'B',
            ],
            [
                'kode_rs' => 'RS004',
                'nama_rs' => 'RS Bhakti Husada',
                'alamat' => 'Jl. Gajah Mada No. 40, Klitren',
                'kota' => 'Yogyakarta',
                'provinsi' => 'DI Yogyakarta',
                'telepon' => '0274-334455',
                'email' => 'rsbh@gmail.com',
                'status' => 'nonaktif',
                'tipe_rs' => 'C',
            ],
            [
                'kode_rs' => 'RS005',
                'nama_rs' => 'RS Umum Pusat Dr. Kariadi',
                'alamat' => 'Jl. Dr. Sutomo No. 16, Randusari',
                'kota' => 'Semarang',
                'provinsi' => 'Jawa Tengah',
                'telepon' => '024-8413476',
                'email' => 'info@rskariadi.id',
                'status' => 'aktif',
                'tipe_rs' => 'A',
            ],
        ];
        foreach ($data as $item) {
            RumahSakit::firstOrCreate($item);
        }
    }
}
