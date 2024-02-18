<?php

namespace App\Http\Controllers\Chats;

use App\Models\Chat;
use App\Http\Controllers\Controller;

class ChatIndexController extends Controller
{
    public function __invoke()
    {
        $chats = Chat::all();
        return response()->json($chats);
    }
}
