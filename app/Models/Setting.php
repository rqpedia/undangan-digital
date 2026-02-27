<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * Kolom yang dapat diisi melalui mass assignment.
     * Ini akan mengizinkan metode seperti Setting::create() 
     * atau Setting::updateOrCreate().
     */
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Opsional: Jika Anda tidak menggunakan kolom created_at dan updated_at
     * di tabel settings, aktifkan baris di bawah ini:
     */
    // public $timestamps = false;
}