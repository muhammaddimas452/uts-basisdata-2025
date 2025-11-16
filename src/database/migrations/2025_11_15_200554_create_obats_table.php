<?php

use App\Models\RumahSakit;
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
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            // 2. Relasi ke Rumah Sakit (karena stok/harga milik RS)
            $table->foreignIdFor(RumahSakit::class)->constrained()
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->string('kode_obat', 20)->comment('Kode internal obat/SKU');
            $table->string('nama_obat');
            $table->string('produsen')->nullable()->comment('Pabrik pembuat obat');
            $table->text('deskripsi')->nullable();
            $table->enum('kategori', [
                'Antibiotik', 
                'Analgesik', 
                'Antasida', 
                'Vitamin', 
                'Obat Keras', 
                'Obat Bebas'
            ])->default('Obat Bebas');
            $table->enum('bentuk_sediaan', [
                'Tablet', 
                'Kapsul', 
                'Sirup', 
                'Salep', 
                'Injeksi',
                'Lainnya'
            ])->default('Tablet');
            $table->string('dosis', 50)->nullable()->comment('Cth: 500mg, 10mg/5ml');
            // Kolom Inventaris
            $table->unsignedInteger('stok')->default(0);
            $table->decimal('harga', 10, 2)->default(0); // 10 digit total, 2 di belakang koma
            $table->boolean('perlu_resep')->default(true);
            $table->timestamps();
            // 3. Membuat kode_obat unik HANYA dalam satu RS yang sama
            $table->unique(['rumah_sakit_id', 'kode_obat']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
