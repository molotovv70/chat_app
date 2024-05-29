<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatWithLastMessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'avatar_path' => $this->avatar_path,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'last_message' => 'This Is Last Message',
        ];
    }
}
