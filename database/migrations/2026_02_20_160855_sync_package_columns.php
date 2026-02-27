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
    Schema::table('users', function (Blueprint $table) {
        // Kolom untuk menyimpan batas harga paket user (Contoh: 50000)
        if (!Schema::hasColumn('users', 'package_price')) {
            $table->integer('package_price')->default(50000);
        }
    });

    Schema::table('themes', function (Blueprint $table) {
        // Kolom harga tema untuk dibandingkan dengan package_price user
        if (!Schema::hasColumn('themes', 'price')) {
            $table->integer('price')->default(50000);
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
