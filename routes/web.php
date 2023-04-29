<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('profile');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [MessageController::class, 'index']);
    Route::get('/messages', [MessageController::class, 'showMessages']);
    Route::get('/profile', [MessageController::class, 'showProfile']);
    Route::get('/sendMessage', [MessageController::class, 'messageForm']);
    Route::post('/sendMessage', [MessageController::class, 'createMessage']);
    Route::post('/answer', [MessageController::class, 'answer']);
});
