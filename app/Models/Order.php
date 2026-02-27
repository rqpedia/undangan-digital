<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Hanya masukkan kolom yang benar-benar ada di DB Anda
    protected $fillable = [
        'user_id',
        'order_id',
        'customer_name',
        'total_price',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}