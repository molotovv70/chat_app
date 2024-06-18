<?php

use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('/chats')->prefix('chats')->group(function () {
        Route::get('/', [ChatController::class, 'index'])->name('chat.index');
        Route::get('/create', [ChatController::class, 'create'])->name('chat.create');
        Route::post('/', [ChatController::class, 'store'])->name('chat.store');
        Route::get('/{id}', [ChatController::class, 'show'])->name('chat.show');

        Route::post('/{id}/message', [ChatController::class, 'storeMessage'])->name('chat.message.store');
        Route::post('/{id}/join', [ChatController::class, 'joinChat'])->name('chat.join.store');
    });

//    Route::prefix('/messages')->prefix('messages')->group(function () {
//        // view routes for admin...
////        Route::get('/', [ChatController::class, 'index'])->name('message.index');
//        Route::post('/', [MessageController::class, 'store'])->name('message.store');
//    });

    Route::prefix('/users')->prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::post('/', [UserController::class, 'storeMessage'])->name('user.chat.store');
        Route::get('/{id}/chat', [UserController::class, 'show'])->name('user.chat.show');
        Route::post('/{id}/chat', [UserController::class, 'store'])->name('user.chat.store');
//        Route::patch('/', [UserController::class, 'store'])->name('user.message.update');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/info', function () {

});

require __DIR__.'/auth.php';
