<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        [
                'rumah_sakit_id' => 1, // Milik RS Harapan Bunda
                'kode_obat' => 'P001',
                'nama_obat' => 'Paracetamol 500mg',
                'produsen' => 'PT. Kimia Farma',
                'deskripsi' => 'Per-strip isi 10 tablet. Meredakan demam dan nyeri ringan.',
                'kategori' => 'Analgesik',
                'bentuk_sediaan' => 'Tablet',
                'dosis' => '500mg',
                'stok' => 1000,
                'harga' => 5000.00,
                'perlu_resep' => false,
            ],
            [
                'rumah_sakit_id' => 1, // Milik RS Harapan Bunda
                'kode_obat' => 'A001',
                'nama_obat' => 'Amoxicillin 500mg',
                'produsen' => 'PT. Sanbe Farma',
                'deskripsi' => 'Antibiotik untuk infeksi bakteri. Harus dengan resep dokter.',
                'kategori' => 'Antibiotik',
                'bentuk_sediaan' => 'Kapsul',
                'dosis' => '500mg',
                'stok' => 500,
                'harga' => 15000.00,
                'perlu_resep' => true,
            ],
            [
                'rumah_sakit_id' => 2, // Milik RS Sentosa Jaya
                'kode_obat' => 'ANT01',
                'nama_obat' => 'Promag Tablet',
                'produsen' => 'PT. Kalbe Farma',
                'deskripsi' => 'Mengurangi gejala sakit maag dan kembung. Per-strip.',
                'kategori' => 'Antasida',
                'bentuk_sediaan' => 'Tablet',
                'dosis' => '1 tablet',
                'stok' => 300,
                'harga' => 8000.00,
                'perlu_resep' => false,
            ],
            [
                'rumah_sakit_id' => 3, // Milik RS Mitra Keluarga
                'kode_obat' => 'VITC01',
                'nama_obat' => 'Vitamin C 500mg',
                'produsen' => 'PT. Sido Muncul',
                'deskripsi' => 'Suplemen daya tahan tubuh.',
                'kategori' => 'Vitamin',
                'bentuk_sediaan' => 'Tablet',
                'dosis' => '500mg',
                'stok' => 800,
                'harga' => 25000.00,
                'perlu_resep' => false,
            ],
            [
                'rumah_sakit_id' => 2, // Milik RS Sentosa Jaya
                'kode_obat' => 'P002-SYR',
                'nama_obat' => 'Paracetamol Sirup 120mg/5ml',
                'produsen' => 'PT. Kimia Farma',
                'deskripsi' => 'Per-botol 60ml. Meredakan demam dan nyeri untuk anak.',
                'kategori' => 'Analgesik',
                'bentuk_sediaan' => 'Sirup',
                'dosis' => '120mg/5ml',
                'stok' => 250,
                'harga' => 18000.00,
                'perlu_resep' => false,
            ],
        ];
        foreach($data as $item) {
            Obat::firstOrCreate($item);
        }
    }
}
