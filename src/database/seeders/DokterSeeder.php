<?php

namespace Database\Seeders;

use App\Models\Dokter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'rumah_sakit_id' => 1, // RS Harapan Bunda
                'poliklinik_id' => 1,  // Poli Umum (Milik RS 1)
                'kode_dokter' => 'DOK-001',
                'nip' => '198001102005011001',
                'str' => '110012345678',
                'nama_lengkap' => 'Dr. Ahmad Subagyo',
                'spesialisasi' => 'Dokter Umum',
                'tanggal_lahir' => '1980-01-10',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Cendana No. 1, Bandung',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'telepon' => '081211112222',
                'email' => 'ahmad.subagyo@rshb.com',
                'golongan_darah' => 'A',
                'pekerjaan' => 'Dokter',
                'status_pernikahan' => 'Menikah',
            ],
            [
                'rumah_sakit_id' => 1, // RS Harapan Bunda
                'poliklinik_id' => 2,  // Poli Gigi (Milik RS 1)
                'kode_dokter' => 'DOK-002',
                'nip' => '198503152010022003',
                'str' => '120098765432',
                'nama_lengkap' => 'Drg. Citra Lestari',
                'spesialisasi' => 'Dokter Gigi',
                'tanggal_lahir' => '1985-03-15',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Dago Asri No. 25, Bandung',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'telepon' => '081322223333',
                'email' => 'citra.lestari@rshb.com',
                'golongan_darah' => 'B',
                'pekerjaan' => 'Dokter Gigi',
                'status_pernikahan' => 'Menikah',
            ],
            [
                'rumah_sakit_id' => 2, // RS Sentosa Jaya
                'poliklinik_id' => 3,  // Poli Anak (Milik RS 2)
                'kode_dokter' => 'DOK-003',
                'nip' => '197907202006011005',
                'str' => '130011223344',
                'nama_lengkap' => 'Dr. Robert Wijaya, Sp.A',
                'spesialisasi' => 'Spesialis Anak',
                'tanggal_lahir' => '1979-07-20',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Panglima Polim No. 70, Jakarta Selatan',
                'kota' => 'Jakarta Selatan',
                'provinsi' => 'DKI Jakarta',
                'telepon' => '081533334444',
                'email' => 'robert.wijaya@rssj.com',
                'golongan_darah' => 'O',
                'pekerjaan' => 'Dokter Spesialis',
                'status_pernikahan' => 'Menikah',
            ],
            [
                'rumah_sakit_id' => 3, // RS Mitra Keluarga
                'poliklinik_id' => 4,  // Poli Jantung (Milik RS 3)
                'kode_dokter' => 'DOK-004',
                'nip' => '198211052009032002',
                'str' => '140055667788',
                'nama_lengkap' => 'Dr. Rina Marlia, Sp.JP',
                'spesialisasi' => 'Spesialis Jantung',
                'tanggal_lahir' => '1982-11-05',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Darmo Permai No. 1, Surabaya',
                'kota' => 'Surabaya',
                'provinsi' => 'Jawa Timur',
                'telepon' => '081744445555',
                'email' => 'rina.marlia@mitrakeluarga.co.id',
                'golongan_darah' => 'AB',
                'pekerjaan' => 'Dokter Spesialis',
                'status_pernikahan' => 'Menikah',
            ],
            [
                'rumah_sakit_id' => 4, // RS Bhakti Husada
                'poliklinik_id' => 5,  // Poli THT (Milik RS 4)
                'kode_dokter' => 'DOK-005',
                'nip' => '198802122015011001',
                'str' => '150099887766',
                'nama_lengkap' => 'Dr. Eko Prasetyo, Sp.THT',
                'spesialisasi' => 'Spesialis THT',
                'tanggal_lahir' => '1988-02-12',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Kaliurang KM 5, Yogyakarta',
                'kota' => 'Yogyakarta',
                'provinsi' => 'DI Yogyakarta',
                'telepon' => '081955556666',
                'email' => 'eko.prasetyo@rsbh.com',
                'golongan_darah' => 'A',
                'pekerjaan' => 'Dokter Spesialis',
                'status_pernikahan' => 'Belum Menikah',
            ],
        ];
        foreach ($data as $item){
            Dokter::firstOrCreate($item);
        }
    }
}
