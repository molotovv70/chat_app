<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar_path',
        'description'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function getMessagesFromMe($receiverUserId)
    {
        return $this->hasMany(UserMessage::class, 'user_id_from', 'id')
            ->where('user_id_to', '=', $receiverUserId);
    }

    public function getMessagesToMe($senderUserId)
    {
        return $this->hasMany(UserMessage::class, 'user_id_to', 'id')
            ->where('user_id_from', '=', $senderUserId);
    }


    public function getMessagesChatUser($otherUserId)
    {

        $messages = $this->getMessagesToMe($otherUserId)->unionAll($this->getMessagesFromMe($otherUserId))->orderBy('id', 'desc');

        return $messages;
//        return $this->hasMany(UserMessage::class, 'user_id_to', 'id')
//            ->where('user_id_from', '=', $otherUserId)
//            ->orWhere('user_id_to', '=', $otherUserId)
//            ->orderBy('created_at')
//            ->paginate(10);

//        $sentMessages = $this->getMessagesFromMe($otherUserId)->get();
//        $receivedMessages = $this->getMessagesToMe($otherUserId)->get();
//
//        return $sentMessages->merge($receivedMessages)->sortBy('created_at');
    }


    public function getChatLastMessage($otherUserId)
    {
        $otherUserId = auth()->user()->id;

        $sentLastMessage = $this->getMessagesFromMe($otherUserId)
            ->orderBy('id', 'desc')
            ->limit(1);

        $receivedLastMessage = $this->getMessagesToMe($otherUserId)
            ->orderBy('id', 'desc')
            ->limit(1);

        $lastMessage = $sentLastMessage->unionAll($receivedLastMessage)
            ->orderBy('id', 'desc')
            ->limit(1);

        return $lastMessage;
    }
}
