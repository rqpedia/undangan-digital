<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'theme_id', 'slug', 
        'groom_name', 'groom_info', 'groom_photo', 
        'bride_name', 'bride_info', 'bride_photo', 
        'wedding_date', 'location', 'maps_url', 'music_file',
        'bank_name_1', 'bank_account_1', 'bank_owner_1',
        'show_couple', 'show_event', 'show_gallery', 'show_gift', 'show_rsvp', 'show_story'
    ];

    protected $casts = [
        'wedding_date' => 'date',
    ];

    /**
     * Relasi ke User pembuat
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Relasi ke semua lampiran (Penting agar Controller store/update tidak error)
     */
    public function attachments(): HasMany
    {
        return $this->hasMany(InvitationAttachment::class);
    }

    /**
     * Relasi khusus untuk mengambil Cover Photo
     */
    public function cover(): HasOne
    {
        return $this->hasOne(InvitationAttachment::class)->where('file_type', 'cover');
    }
    public function loveStories()
{
    return $this->hasMany(LoveStory::class, 'invitation_id')->orderBy('sort_order', 'asc');
}
}