<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Chat extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = false;

    protected $fillable = [
        'title',
        'description',
        'avatar_path',
    ];

    public function getChatMessages(): HasMany
    {
        return $this->hasMany(ChatMessage::class, 'chat_id', 'id');
//            dd($this->hasMany(ChatMessage::class, 'chat_id', 'id')->toRawSql());

//        return $this->hasMany(UserMessage::class, 'user_id_from', 'id')
//            ->where('user_id_to', '=', $receiverUserId);
    }
}
