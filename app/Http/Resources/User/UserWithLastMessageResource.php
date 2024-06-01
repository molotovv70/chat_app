<?php

namespace App\Http\Resources\User;

use App\Models\User;
use App\Models\UserMessage;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserWithLastMessageResource extends JsonResource
{


    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
//        $ = auth()->user()->id;
//        dd($this->id);
//        dd(auth()->user()->id);

//        $lastMessage = $this->getChatLastMessage($this->id, $myUserId);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'description' => $this->description,
            'avatar_path' => $this->avatar_path,
            'created_at' => $this->created_at,
        ];
    }

//            'chat_last_message' => $this->getChatLastMessage($this->id, $this->id),
}
