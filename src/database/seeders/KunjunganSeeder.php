<?php

namespace Database\Seeders;

use App\Models\Kunjungan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KunjunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'pasien_id' => 1, // Budi Santoso
                'dokter_id' => 1, // Dr. Ahmad Subagyo (Poli Umum)
                'tanggal_kunjungan' => now()->subDays(5), // 5 hari yang lalu
                'status' => 'Selesai',
                'keluhan' => 'Demam tinggi selama 3 hari, batuk kering, dan sakit kepala.',
                'diagnosis' => 'Infeksi Saluran Pernapasan Akut (ISPA)',
                'catatan_resep' => 'Paracetamol 500mg (3x1)\nAmoxicillin 500mg (3x1, habiskan)\nIstirahat cukup.',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'pasien_id' => 2, // Siti Aminah
                'dokter_id' => 3, // Dr. Robert Wijaya (Poli Anak)
                'tanggal_kunjungan' => now()->subDays(2), // 2 hari yang lalu
                'status' => 'Selesai',
                'keluhan' => 'Anak (pasien) mengalami diare ringan dan sedikit demam.',
                'diagnosis' => 'Gastroenteritis (Flu Perut)',
                'catatan_resep' => 'Oralit (setiap setelah BAB)\nParacetamol sirup (jika demam > 38C)\nJaga asupan cairan.',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'pasien_id' => 3, // Agus Wijaya
                'dokter_id' => 4, // Dr. Rina Marlia (Poli Jantung)
                'tanggal_kunjungan' => now()->subDays(1), // 1 hari yang lalu
                'status' => 'Selesai',
                'keluhan' => 'Nyeri dada di sebelah kiri, terasa berat dan sesak napas setelah naik tangga.',
                'diagnosis' => 'Angina Pectoris (suspect)',
                'catatan_resep' => 'Rujuk untuk EKG dan tes treadmill.\nAspilet (1x1 setelah makan).',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'pasien_id' => 4, // Dewi Lestari
                'dokter_id' => 1, // Dr. Ahmad Subagyo (Poli Umum)
                'tanggal_kunjungan' => now()->addDays(1), // Besok
                'status' => 'Dijadwalkan',
                'keluhan' => 'Konsultasi hasil medical check-up tahunan.',
                'diagnosis' => null,
                'catatan_resep' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pasien_id' => 5, // Rian Hidayat
                'dokter_id' => 2, // Drg. Citra Lestari (Poli Gigi)
                'tanggal_kunjungan' => now()->subDays(1), // Kemarin
                'status' => 'Dibatalkan',
                'keluhan' => 'Gigi berlubang terasa sakit (dibatalkan oleh pasien).',
                'diagnosis' => null,
                'catatan_resep' => null,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
        ];
        foreach($data as $item){
            Kunjungan::firstOrCreate($item);
        }
    }
}
