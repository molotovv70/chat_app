<?php

namespace App\Http\Controllers\Chat;

use App\Enums\Roles;
use App\Events\StoreUserChatMessageEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\StoreRequest;
use App\Http\Resources\Chat\ChatWithLastMessageResource;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\ChatUser;
use App\Models\User;
use App\Services\ChatService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
//        $chats = Chat::all();

//        $chatsArray = ChatWithLastMessageResource::collection($chats)->resolve();

        return Inertia::render('Chat/Index', [
            'user' => $user,
        ]);
//            'chats' => $chatsArray,
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Chat/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['avatar_path'] = ChatService::storeAvatarChat($data['avatar_path']);

        $chat = Chat::create($data);

        $user = auth()->user();

        $chatUserData = [
            'user_id' => $user->id,
            'chat_id' => $chat->id,
            'role_id' => Roles::Admin->value,
        ];

        $chatUserData = ChatUser::create($chatUserData);
        $role = $chatUserData['role_id'];

        return redirect()->route('chat.show', ['id' => $chat->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chat = Chat::findOrFail($id);

        $user = Auth::user();
        $user->role = $user->getChatRole($id)->get()->toArray();

        $messages = $chat->getMessages()->get()->toArray();

        $users = $chat->getUsers()->get()->toArray();

        return Inertia::render('Chat/Show', ['chat' => $chat, 'user' => $user, 'messages' => $messages, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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

    public function getChats()
    {
        $chats = Chat::all();

        $chatsArray = ChatWithLastMessageResource::collection($chats)->resolve();

        return $chatsArray;

    }

    public function storeMessage($id, Request $request)
    {
        $message = ChatMessage::create([
            'user_id' => auth()->id(),
            'chat_id' => $id,
            'content' => $request['content'],
        ]);

        $messageChat = $message->toArray();

        StoreUserChatMessageEvent::dispatch($id, auth()->id(), $messageChat);

        return $message;
    }

    public function joinChat($id)
    {
        $user = Auth::user();

        $chatUserData = ChatUser::firstOrCreate([
            'user_id' => auth()->id(),
            'chat_id' => $id,
        ]);

        return $chatUserData;
    }
}
