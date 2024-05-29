<?php

namespace App\Services;

use App\Models\Chat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ChatService
{
    public static function storeAvatarChat($path): string | null
    {
        if (isset($path)) {
            $path = Storage::disk('public')->put('/chats', $path);

            $fullPathURL = Storage::url($path);
            $fullPathURL = Str::ltrim($fullPathURL, $fullPathURL[0]);

            Image::read($fullPathURL)->resize(100, 100)->save();

            return $path;
        }

        return null;
    }

//    public static function updateAvatarChat($path): string | null
//    {
//        if (isset($data['avatar_path'])) {
//
//            $path = Storage::disk('public')->put('/chats', $data['avatar_path']);
//
////            $chat = $data['id'] ? Chat::find($data['id']) : $data;
//
//            $chat = Chat::find($data['id']);
//
//            if (isset(Chat::find($data['id'])->avatar_path))
//            {
//                Storage::disk('public')->delete($chat->avatar_path);
//            }
//
//            $chat->avatar_path = $path;
//
//            $fullPathURL = Storage::url($path);
//            $fullPathURL = Str::ltrim($fullPathURL, $fullPathURL[0]);
//
//            Image::read($fullPathURL)->resize(100, 100)->save();
//
//            return $path;
//        }
//
//        return null;
//    }
}
