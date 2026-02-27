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
    Schema::table('invitations', function (Blueprint $table) {
        // Menambahkan kolom show_story setelah kolom show_rsvp
        $table->boolean('show_story')->default(false)->after('show_rsvp');
    });
}

public function down(): void
{
    Schema::table('invitations', function (Blueprint $table) {
        $table->dropColumn('show_story');
    });
}
};
