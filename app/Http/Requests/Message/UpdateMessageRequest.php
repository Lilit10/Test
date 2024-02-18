<?php

// app/Http/Requests/MessageUpdateRequest.php

namespace App\Services\Messages\Dto\Message;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMessageRequest extends FormRequest
{
    private const USER_ID = 'user_id';
    private const CONTENT = 'content';
    private const FILE = 'file';

    public function rules()
    {
        return [
            self::USER_ID => 'sometimes|required|exists:users,id',
            self::CONTENT => 'sometimes|nullable|string',
            self::FILE => 'sometimes|nullable|file',
        ];
    }

    public function getUserId()
    {
        return $this->input(self::USER_ID);
    }

    public function getMessageContent()
    {
        return $this->input(self::CONTENT);
    }

    public function getFile()
    {
        return $this->file(self::FILE);
    }
}
