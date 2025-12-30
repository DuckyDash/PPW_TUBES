<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('panens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kolam_id');
            $table->unsignedBigInteger('user_id'); // ID Pemilik
            $table->string('pemilik'); // Nama Pemilik (Snapshot)
            $table->string('jenis_ikan');
            $table->decimal('berat_bibit', 8, 2);
            $table->decimal('berat_panen', 8, 2);
            $table->decimal('harga_per_kilo', 12, 2)->nullable(); // Diisi Admin
            $table->decimal('total_harga', 15, 2)->nullable(); // Hitungan Otomatis
            $table->enum('status', ['Menunggu Verifikasi', 'Disetujui', 'Terjual'])->default('Menunggu Verifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panens');
    }
};
