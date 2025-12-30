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
        Schema::table('kolams', function (Blueprint $table) {
            // Berat bibit dalam Kg
            $table->decimal('berat_bibit', 8, 2)->after('jenis_ikan')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kolams', function (Blueprint $table) {
            //
        });
    }
};
