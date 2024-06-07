<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class UserService
{
    public static function storeAvatarUser($data): string | null
    {
        if (isset($data['avatar_path'])) {
            $path = Storage::disk('public')->put('/avatars', $data['avatar_path']);

            if (auth()->user()->avatar_path) {
                Storage::disk('public')->delete(auth()->user()->avatar_path);
            }

            $fullPathURL = Storage::url($path);
            $fullPathURL = Str::ltrim($fullPathURL, $fullPathURL[0]);

            Image::read($fullPathURL)->resize(100, 100)->save();

            return $path;
        }

        return auth()->user()->avatar_path;
    }
}
