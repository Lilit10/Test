<?php

namespace App\Notifications;

use App\Models\Chat;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class RemoveUserFromChatNotification extends Notification
{
    use Queueable;

    protected $chat;

    public function __construct($chat)
    {
        $this->chat = $chat;
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('You have been removed from a chat!')
            ->line('If you have any concerns or questions, please contact the chat administrator.')
            ->line('Thank you for using our application!');
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}
