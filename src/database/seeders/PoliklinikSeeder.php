<?php

namespace Database\Seeders;

use App\Models\Poliklinik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliklinikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'rumah_sakit_id' => 1, // <-- ID 1: RS Harapan Bunda
                'nama_poli' => 'Poli Umum',
                'deskripsi' => 'Melayani pemeriksaan kesehatan umum untuk semua usia.',
                'kode_poli' => 'PU-001',
                'lokasi' => 'Lantai 1, Gedung A',
                'jam_buka' => '08:00:00',
                'jam_tutup' => '16:00:00',
                'status' => 'aktif',
            ],
            [
                'rumah_sakit_id' => 1, // <-- ID 1: RS Harapan Bunda
                'nama_poli' => 'Poli Gigi',
                'deskripsi' => 'Pemeriksaan, penambalan, dan pembersihan karang gigi.',
                'kode_poli' => 'GIGI-001',
                'lokasi' => 'Lantai 2, Gedung A',
                'jam_buka' => '09:00:00',
                'jam_tutup' => '17:00:00',
                'status' => 'aktif',
            ],
            [
                'rumah_sakit_id' => 2, // <-- ID 2: RS Sentosa Jaya
                'nama_poli' => 'Poli Anak',
                'deskripsi' => 'Spesialis kesehatan anak dan imunisasi.',
                'kode_poli' => 'ANAK-001',
                'lokasi' => 'Lantai 1, Gedung B (Anak)',
                'jam_buka' => '08:00:00',
                'jam_tutup' => '15:00:00',
                'status' => 'aktif',
            ],
            [
                'rumah_sakit_id' => 3, // <-- ID 3: RS Mitra Keluarga
                'nama_poli' => 'Poli Jantung (Kardiologi)',
                'deskripsi' => 'Pusat layanan kesehatan kardiovaskular.',
                'kode_poli' => 'JTG-001',
                'lokasi' => 'Lantai 3, Gedung Utama',
                'jam_buka' => '08:00:00',
                'jam_tutup' => '16:00:00',
                'status' => 'aktif',
            ],
            [
                'rumah_sakit_id' => 4, // <-- ID 4: RS Bhakti Husada
                'nama_poli' => 'Poli THT',
                'deskripsi' => 'Layanan Telinga, Hidung, dan Tenggorokan.',
                'kode_poli' => 'THT-001',
                'lokasi' => 'Lantai 2',
                'jam_buka' => '10:00:00',
                'jam_tutup' => '16:00:00',
                'status' => 'nonaktif', // Ikut nonaktif seperti RSnya
            ],
        ];
        foreach ($data as $item) {
            Poliklinik::firstOrCreate($item);
        }
    }
}
