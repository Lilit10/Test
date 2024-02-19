<?php

use App\Http\Controllers\Chats\ChatDeleteController;
use App\Http\Controllers\Chats\CreateChatController;
use App\Http\Controllers\ChatUserController;
use App\Http\Controllers\ChatUserRemoveController;
use App\Http\Controllers\Files\FileDeleteController;
use App\Http\Controllers\Files\FileIndexController;
use App\Http\Controllers\Files\FileShowController;
use App\Http\Controllers\Files\FileStoreController;
use App\Http\Controllers\Files\FileUpdateController;
use App\Http\Controllers\Messages\MessageDeleteController;
use App\Http\Controllers\Messages\MessageIndexController;
use App\Http\Controllers\Messages\MessageShowController;
use App\Http\Controllers\Messages\MessageStoreController;
use App\Http\Controllers\Messages\MessageUpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Chats\ChatShowController;
use App\Http\Controllers\Chats\ChatIndexController;
use App\Http\Controllers\Chats\ChatStoreController;
use App\Http\Controllers\Chats\ChatUpdateController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);

//Route::post('/chats', ChatStoreController::class);
Route::put('/chats/{id}', ChatUpdateController::class);
Route::get('chats', ChatIndexController::class);
Route::get('chats/{id}', ChatShowController::class);
Route::delete('chats/{id}', ChatDeleteController::class);

Route::post('chats/{chatId}/users', ChatUserController::class);
Route::delete('/chats/{chat_id}/users/{user_id}', ChatUserRemoveController::class);

Route::post('messages', MessageStoreController::class);
Route::get('messages', MessageIndexController::class);
Route::get('messages/{chat_id}', MessageShowController::class);
Route::put('messages/{id}',MessageUpdateController::class);
Route::delete('messages/{id}', MessageDeleteController::class);

Route::post('files', FileStoreController::class);
Route::post('files/{id}', FileUpdateController::class);
Route::delete('files/{id}', FileDeleteController::class);
Route::get('files/{id}', FileShowController::class);
Route::get('files', FileIndexController::class);


Route::prefix('chat')->middleware('auth')->group(function () {
//    Route::post('/chats', ChatStoreController::class);
//    Route::put('/chats/{id}', ChatUpdateController::class);
//    Route::get('chats', ChatIndexController::class);
//    Route::get('chats/{id}', ChatShowController::class);
//    Route::delete('chats/{id}', ChatDeleteController::class);
});
Route::post('chat', CreateChatController::class);

//Route::prefix('/chats')->group(function () {
//    Route::post('/', CreateChatController::class);
//});
