<?php

namespace App\Events;

use App\Http\Resources\Message\MessageResource;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StoreUserMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;
    public array $message;

    /**
     * Create a new event instance.
     */
    public function __construct($id, $message)
    {
        $this->id = $id;
        $this->message = $message;
//        dd($message['user_id_to']);
    }


//            'message' => MessageResource::make($this->message->loadCount('likedUsers'))->resolve(),
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
            new Channel('users.'.$this->message['user_id_to']),
        ];
    }
}
