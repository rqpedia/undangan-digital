<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvitationAttachment extends Model
{
    protected $fillable = ['invitation_id', 'file_path', 'file_type'];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }
}