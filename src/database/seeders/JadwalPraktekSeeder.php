<?php

namespace Database\Seeders;

use App\Models\JadwalPraktek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalPraktekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'dokter_id' => 1,       // Dr. Ahmad Subagyo
                'poliklinik_id' => 1,   // Poli Umum (di RS 1)
                'hari' => 'Senin',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '11:00:00',
                'kuota' => 25,
                'status' => 'aktif',
                'keterangan' => 'Pemeriksaan umum dan konsultasi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dokter_id' => 1,       // Dr. Ahmad Subagyo
                'poliklinik_id' => 1,   // Poli Umum (di RS 1)
                'hari' => 'Rabu',      // Hari praktek kedua
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '11:00:00',
                'kuota' => 25,
                'status' => 'aktif',
                'keterangan' => 'Pemeriksaan umum dan konsultasi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dokter_id' => 2,       // Drg. Citra Lestari
                'poliklinik_id' => 2,   // Poli Gigi (di RS 1)
                'hari' => 'Selasa',
                'jam_mulai' => '09:00:00',
                'jam_selesai' => '12:00:00',
                'kuota' => 15,
                'status' => 'aktif',
                'keterangan' => 'Pembersihan karang gigi dan penambalan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dokter_id' => 3,       // Dr. Robert Wijaya, Sp.A
                'poliklinik_id' => 3,   // Poli Anak (di RS 2)
                'hari' => 'Senin',
                'jam_mulai' => '10:00:00',
                'jam_selesai' => '13:00:00',
                'kuota' => 20,
                'status' => 'aktif',
                'keterangan' => 'Imunisasi dan pemeriksaan tumbuh kembang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dokter_id' => 4,       // Dr. Rina Marlia, Sp.JP
                'poliklinik_id' => 4,   // Poli Jantung (di RS 3)
                'hari' => 'Kamis',
                'jam_mulai' => '14:00:00',
                'jam_selesai' => '17:00:00',
                'kuota' => 10,
                'status' => 'aktif',
                'keterangan' => 'Konsultasi kardiologi (Hanya rujukan).',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        foreach($data as $item){
            JadwalPraktek::firstOrCreate($item);
        }
    }
}
