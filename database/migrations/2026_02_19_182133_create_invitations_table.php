<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('theme_id')->constrained()->onDelete('cascade');
            $table->string('slug')->unique();
            
            // --- Data Pengantin & Keterangan ---
            $table->string('groom_name');
            $table->text('groom_info')->nullable(); // Contoh: "Putra pertama dari Bapak A & Ibu B"
            $table->string('groom_photo')->nullable();
            
            $table->string('bride_name');
            $table->text('bride_info')->nullable(); // Contoh: "Putri kedua dari Bapak C & Ibu D"
            $table->string('bride_photo')->nullable();
            
            // --- Detail Acara Utama ---
            $table->date('wedding_date');
            $table->string('location');
            $table->text('maps_url')->nullable();
            
            // --- Fitur Tambahan & Musik ---
            $table->string('music_file')->nullable();
            
            // --- Data Amplop Digital ---
            $table->string('bank_name_1')->nullable();
            $table->string('bank_account_1')->nullable();
            $table->string('bank_owner_1')->nullable();

            // --- Toggle Kontrol Section (Tampilkan/Sembunyikan) ---
            $table->boolean('show_couple')->default(true);
            $table->boolean('show_event')->default(true);
            $table->boolean('show_gallery')->default(true);
            $table->boolean('show_gift')->default(true);
            $table->boolean('show_rsvp')->default(true);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};