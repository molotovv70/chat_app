<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    use HasFactory;

    protected $table = 'user_messages';

    protected $fillable = [
        'user_id_from',
        'user_id_to',
        'chat_id',
        'parent_id',
        'content',
        'updated_at',
        'deleted_at'
    ];
}
