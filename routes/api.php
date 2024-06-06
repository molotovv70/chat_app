<?php

use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\UserController;
//use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Route::prefix('/users')->group(function () {
//    Route::get('/', [UserController::class, 'index']);
//})->name('user');

Route::get('test', function () {
//   dd(Route::getCurrentRoute()->middleware());
    return \Illuminate\Support\Facades\Auth::user();
});

Route::prefix('/chats')->group(function () {
    Route::get('/', [ChatController::class, 'getChats']);
})->name('chat');
