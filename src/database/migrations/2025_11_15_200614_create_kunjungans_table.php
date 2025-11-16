<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pasien;       // <-- 1. Import Pasien
use App\Models\Dokter;       // <-- 2. Import Dokter

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kunjungans', function (Blueprint $table) {
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungans');
    }
};
