<?php

namespace Database\Seeders;

use App\Models\Resep;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kunjungan_id' => 1, // Kunjungan Budi (ISPA)
                'obat_id' => 1,      // Obat: Paracetamol 500mg (di RS 1)
                'jumlah' => 10,
                'aturan_pakai' => '3x1 Sesudah Makan',
                'keterangan' => 'Jika demam',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'kunjungan_id' => 1, // Kunjungan Budi (ISPA)
                'obat_id' => 2,      // Obat: Amoxicillin 500mg (di RS 1)
                'jumlah' => 15,
                'aturan_pakai' => '3x1 Sesudah Makan',
                'keterangan' => 'Habiskan (Antibiotik)',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'kunjungan_id' => 2, // Kunjungan Siti (Diare Anak)
                'obat_id' => 5,      // Obat: Paracetamol Sirup (di RS 2)
                'jumlah' => 1,
                'aturan_pakai' => '3x 1/2 sdt',
                'keterangan' => 'Jika demam > 38C',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'kunjungan_id' => 2, // Kunjungan Siti (Diare Anak)
                'obat_id' => 3,      // Obat: Promag Tablet (di RS 2) - Contoh
                'jumlah' => 5,
                'aturan_pakai' => '2x1 Kunyah',
                'keterangan' => 'Jika kembung',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'kunjungan_id' => 3, // Kunjungan Agus (Jantung)
                'obat_id' => 4,      // Obat: Vitamin C (di RS 3) - Contoh pengganti Aspilet
                'jumlah' => 30,
                'aturan_pakai' => '1x1 Sesudah Makan',
                'keterangan' => 'Jaga daya tahan tubuh.',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
        ];
        foreach($data as $item){
            Resep::firstOrCreate($item);
        }
    }
}
