<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['invitation_id', 'name', 'message', 'presence', 'reply'];
}