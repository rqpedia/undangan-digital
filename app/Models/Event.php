<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'invitation_id',
        'event_name',
        'date',
        'start_time',
        'end_time',
        'location_name',
        'address',
        'google_maps_url'
    ];

    // Tambahkan ini agar tanggal otomatis menjadi objek Carbon
    protected $casts = [
        'date' => 'date',
    ];

    /**
     * Relasi ke Model Invitation
     */
    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }
}