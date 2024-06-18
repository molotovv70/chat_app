<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StoreUserChatMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;
    public $message;
    public $userId;

    /**
     * Create a new event instance.
     */
    public function __construct($id, $userId, $message)
    {
        $this->id = $id;
        $this->message = $message;
        $this->userId = $userId;
    }

    public function broadcastWhen(): bool
    {
        return $this->message['user_id'] == $this->userId;
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->message,
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('chats.'.$this->id),
        ];
    }
}
