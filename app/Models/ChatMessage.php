<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'chat_id',
        'parent_id',
    ];
//        'deleted_at',
//        'updated_at',
//        'created_at',
}
