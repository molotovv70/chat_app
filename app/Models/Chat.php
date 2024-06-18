<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Notifications\Notifiable;

class Chat extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = false;

//    protected $fillable = ['*'];

    protected $fillable = [
        'title',
        'description',
        'avatar_path',
    ];

//    protected $hidden = [
//        'password',
//        'remember_token',
//    ];

    public function getMessages(): HasMany
    {
        $messages = $this->hasMany(ChatMessage::class, 'chat_id', 'id');

        return $messages;
    }

    public function getUsers(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, ChatUser::class, 'chat_id', 'id', 'id', 'user_id');
    }
}
