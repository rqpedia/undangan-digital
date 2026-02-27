<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel invitations
            $table->foreignId('invitation_id')->constrained()->onDelete('cascade');
            
            $table->string('name'); // Sesuai <input name="events[0][name]">
            $table->date('date'); // Sesuai <input name="events[0][date]">
            $table->time('start'); // Sesuai <input name="events[0][start]">
            $table->time('end')->nullable(); // Sesuai <input name="events[0][end]">
            
            $table->string('location_name'); // Sesuai <input name="events[0][location_name]">
            $table->text('address'); // Sesuai <textarea name="events[0][address]">
            $table->string('maps_url')->nullable(); // Sesuai <input name="events[0][maps_url]">
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};