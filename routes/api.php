<?php

use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\UserMessageController;
//use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/users')->middleware('web')->group(function () {
    Route::get('/', [UserMessageController::class, 'index']);
})->name('user');

Route::prefix('/chats')->group(function () {
    Route::get('/', [ChatController::class, 'getChats']);
})->name('chat');
