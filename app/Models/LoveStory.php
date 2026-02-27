<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoveStory extends Model
{
    use HasFactory;

    // Menentukan tabel jika nama tabelnya bukan 'love_stories'
    protected $table = 'love_stories';

    // Ini diletakkan di sini: Memberitahu Laravel kolom mana yang boleh diisi (Mass Assignment)
    protected $fillable = ['invitation_id', 'date', 'title', 'description', 'image', 'sort_order'];

    // Ini diletakkan di sini: Relasi balik ke tabel Invitation
    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }
}