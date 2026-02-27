<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('love_stories', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel utama undangan (misal: invitations)
            $table->foreignId('invitation_id')->constrained()->onDelete('cascade');
            
            $table->string('date'); // Untuk menyimpan "Januari 2024" atau "Tahun 2022"
            $table->string('title'); // Judul momen
            $table->text('description'); // Isi cerita
            
            // Opsional: Jika ingin menambahkan foto per momen di masa depan
            $table->string('image')->nullable(); 
            
            // Untuk mengatur urutan tampilan manual
            $table->integer('sort_order')->default(0); 
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('love_stories');
    }
};