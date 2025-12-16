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
        Schema::create('kolams', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kolam');
            $table->string('jenis_ikan');
            $table->decimal('suhu_air', 5, 2); // Contoh: 28.50
            $table->decimal('ph_air', 3, 1);   // Contoh: 7.2
            $table->string('status_pakan');    // Diberikan / Belum
            $table->string('pemilik');
            $table->string('status');          // Aktif, Perawatan, Nonaktif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kolams');
    }
};
