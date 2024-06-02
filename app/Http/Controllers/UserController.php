<?php

namespace App\Http\Controllers;

use App\Events\StoreUserMessageEvent;
use App\Http\Requests\User\StoreChat;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserWithLastMessageResource;
use App\Models\Message;
use App\Models\User;
use App\Models\UserMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
//        dd($userIdTo);
        $message = UserMessage::create($data)->toArray();
//        dd($message->data)

        StoreUserMessageEvent::dispatch($userIdTo, $message);
//        StoreUserMessageEvent::dispatch($data);

        return $message;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $fromId)
    {
        $user = User::find($fromId);
        $userData = UserResource::make($user)->resolve();

        $myUserId = auth()->user()->id;
        $messages = $user->getMessagesChatUser($myUserId);

        foreach ($messages as $message) {
            $message->created_at_formatted = $message->created_at->diffForHumans();
            $message->updated_at_formatted = $message->updated_at->toFormattedDateString();
        }

        $messages->toArray();


        return Inertia::render('User/Show', ['user_to' => $userData, 'messages' => $messages]);
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

}
