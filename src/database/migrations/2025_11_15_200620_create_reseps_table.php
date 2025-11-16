<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Kunjungan; // <-- 1. Import
use App\Models\Obat;      // <-- 2. Import

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reseps', function (Blueprint $table) {
            $table->id();
            // === RELASI UTAMA ===
            $table->foreignIdFor(Kunjungan::class)->constrained()
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(Obat::class)->constrained()
                  ->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedInteger('jumlah')->default(1)
                  ->comment('Jumlah obat, cth: 10 (tablet), 1 (botol)');
            $table->string('aturan_pakai', 100)
                  ->comment('Cth: 3x1 Sesudah Makan');
            $table->text('keterangan')->nullable()
                  ->comment('Cth: Habiskan, Jika perlu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseps');
    }
};
