<?php

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
    Schema::table('users', function (Blueprint $table) {
        // Cek jika kolom package_level belum ada, maka buat
        if (!Schema::hasColumn('users', 'package_level')) {
            $table->integer('package_level')->default(1)->after('role');
        }
        
        // Cek jika kolom is_active belum ada, maka buat
        if (!Schema::hasColumn('users', 'is_active')) {
            $table->boolean('is_active')->default(false)->after('package_level');
        }
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['package_level', 'is_active']);
    });
}
};
