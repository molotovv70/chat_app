<?php

namespace App\Http\Controllers;

use App\Events\StoreUserMessageEvent;
use App\Http\Requests\User\StoreChat;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserWithLastMessageResource;
use App\Http\Resources\UserMessageResource;
use App\Models\Message;
use App\Models\User;
use App\Models\UserMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myUserId = auth()->user();
        $users = User::all();

        foreach ($users as $user) {
            $lastMessage = $user->getChatLastMessage($myUserId)->get();
            $user->last_message = $lastMessage->toArray();
        }

        return UserWithLastMessageResource::collection($users)->resolve();
    }

    /**
     * Store a newly created resource in storage.
     */
//    public function store(StoreChat $request, string $id)
    public function store(Request $request, string $id)
    {
        $data = $request->all();
        $data['user_id_to'] = $id;

        $userIdTo = $id;
        $message = UserMessage::create($data)->toArray();

        StoreUserMessageEvent::dispatch($userIdTo, $message);

        return $message;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $fromId)
    {
        $user = User::find($fromId);
        $userData = UserResource::make($user)->resolve();

        $myUserId = Auth::id();
//        $messages = $user->getMessagesChatUser($myUserId)->get()->reverse(); OLD
        $messages = $user->getMessagesChatUser($myUserId);

//        $messagesResource = UserMessageResource::collection($messages)->resolve(); OLD
        $messagesResource = UserMessageResource::collection($messages->paginate(15));

        return Inertia::render('User/Show', [
            'user_to' => $userData,
            'messages' => $messagesResource,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function storeChat(string $id, StoreChat $request)
    {
        $data = $request->validated();

    }

    public function fetchUserChatMessages($fromId)
    {
        $user = User::find($fromId);
        $myUserId = Auth::id();

        $messages = $user->getMessagesChatUser($myUserId);

        $userMessagesResourceWithPagination = UserMessageResource::collection($messages->paginate(15));

        return $userMessagesResourceWithPagination;
    }
}
