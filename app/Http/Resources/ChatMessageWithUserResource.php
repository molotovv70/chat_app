<?php

namespace App\Http\Resources;

use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatMessageWithUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'chat_id' => $this->chat_id,
            'content' => $this->content,
            'parent_id' => $this->parent_id,
            'created_at_formatted' => $this->created_at->diffForHumans(),
            'user' => User::find($this->user_id)->toArray(),
        ];
    }
}
