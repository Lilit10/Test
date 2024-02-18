<?php


namespace App\Jobs;

use App\Models\Chat;
use App\Models\User;
use App\Notifications\AddUserToChatNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendChatCreatedNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $chat;

    public function __construct(Chat $chat)
    {
        $this->chat = $chat;
    }

    public function handle()
    {
        foreach ($this->chat->users as $user) {
            $user->notify(new AddUserToChatNotification($this->chat));

            \Illuminate\Support\Facades\Log::info("Notification sent to user {$user->id} for chat {$this->chat->id}");
        }
    }
}
