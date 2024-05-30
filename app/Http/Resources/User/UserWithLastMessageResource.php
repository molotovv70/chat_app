<?php

namespace App\Http\Resources\User;

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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'description' => $this->description,
            'avatar_path' => $this->avatar_path,
            'created_at' => $this->created_at,
            'last_message' => 'This Is Last Message LastMessageResource',
        ];
    }

}
