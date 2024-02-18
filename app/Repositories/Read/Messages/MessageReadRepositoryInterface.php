<?php

namespace App\Repositories\Read\Messages;

interface MessageReadRepositoryInterface
{
     public function getByChatIdAndUserId(int $chatId, int $userId);
}
