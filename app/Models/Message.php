<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $casts = [
        'text' => 'encrypted'
    ];

    protected $hidden = [
        'text'
    ];

    protected $fillable = [
        'user_id_sender',
        'user_id_reciever',
        'text',
        'is_read'
    ];
}
