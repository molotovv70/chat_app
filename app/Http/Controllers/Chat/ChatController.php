<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\StoreRequest;
use App\Http\Resources\Chat\ChatWithLastMessageResource;
use App\Models\Chat;
use App\Models\User;
use App\Services\ChatService;
use Illuminate\Http\Request;
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
//        dd($request->all());
        $data = $request->validated();
//        dd($data);
        $data['avatar_path'] = ChatService::storeAvatarChat($data);

//        dd($data);
        $chat = Chat::create($data);
//        dd($chat);

        return redirect()->route('chat.show', ['id' => $chat->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $chat = Chat::findOrFail($id);

        return Inertia::render('Chat/Show', ['chat' => $chat]);
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

    public function getChats() {
        $chats = Chat::all();

        $chatsArray = ChatWithLastMessageResource::collection($chats)->resolve();

        return $chatsArray;

    }
}
