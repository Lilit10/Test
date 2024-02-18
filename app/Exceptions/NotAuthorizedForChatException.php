<?php

namespace App\Exceptions;

use Exception;

class NotAuthorizedForChatException extends Exception
{
    public function getStatus()
    {
        return 600;
    }

    public function getStatusMessage()
    {
        return 'User not authorized for this chat';
    }
}
