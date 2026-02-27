<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions'; // Merujuk ke tabel bawaan Laravel
    
    // Matikan incrementing karena ID session Laravel biasanya string (random hash)
    public $incrementing = false;
    protected $keyType = 'string';
    
    // Matikan timestamps default Laravel (created_at/updated_at)
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}