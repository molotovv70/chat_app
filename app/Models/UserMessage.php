<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    use HasFactory;

    protected $table = 'user_messages';

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $fillable = [
        'user_id_from',
        'user_id_to',
        'chat_id',
        'parent_id',
        'content',
        'updated_at',
        'deleted_at'
    ];


//    protected function casts():
//    {
//        return [
//            'created_at' => 'datetime:Y-m-d H:i:s',
//            'updated_at' => 'datetime:Y-m-d H:i:s',
//        ];
//    }
}
