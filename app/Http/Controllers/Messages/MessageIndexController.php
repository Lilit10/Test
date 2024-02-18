<?php

// app/Http/Controllers/Messages/MessageIndexController.php

namespace App\Http\Controllers\Messages;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageIndexController extends Controller
{
    public function __invoke()
    {
        $messages = Message::all();
        return response()->json($messages);
    }
}


