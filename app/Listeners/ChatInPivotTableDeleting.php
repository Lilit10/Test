<?php

namespace App\Listeners;

use App\Models\ChatUsers;
use App\Events\ChatDeleted;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChatInPivotTableDeleting
{
    public function handle(ChatDeleted $event): void
    {
        ChatUsers::where('chat_id', $event->id)->delete();
    }
}
