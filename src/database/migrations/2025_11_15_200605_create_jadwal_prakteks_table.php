<?php

use App\Models\Dokter;
use App\Models\Poliklinik;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_prakteks', function (Blueprint $table) {
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_prakteks');
    }
};
