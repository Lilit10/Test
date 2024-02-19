<?php

namespace App\Repositories\Write\Chats\Read\Messages;

interface MessageReadRepositoryInterface
{
     public function getByChatIdAndUserId(int $chatId, int $userId);
}
