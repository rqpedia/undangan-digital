<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    // Tambahkan baris ini agar Laravel mengizinkan kolom-kolom ini diisi
    protected $fillable = ['name', 'slug', 'price', 'view_path', 'thumbnail', 'is_active', 'level', 'package_label'];
    
}