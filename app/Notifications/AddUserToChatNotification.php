<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddUserToChatNotification extends Notification
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
            ->line('You have been added to a chat!')
            ->action('View Chat', url('/chats/' . $this->chat->id))
            ->line('Thank you for using our application!');
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}

