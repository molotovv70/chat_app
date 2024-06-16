<?php

use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\UserController;
//use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/user1', function (Request $request) {
    return $request->user();
})->middleware('api');

Route::prefix('/users')->middleware('web')->group(function () {
    Route::get('/', [UserController::class, 'index']);

    Route::get('/{fromId}/messages', [UserController::class, 'fetchUserChatMessages']);

})->name('user');

Route::get('test', function () {
    return auth()->user();
})->middleware('api');

Route::prefix('/chats')->group(function () {
    Route::get('/', [ChatController::class, 'getChats']);
})->name('chat');
