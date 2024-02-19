<?php

// app/Http/Requests/MessageUpdateRequest.php

namespace App\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMessageRequest extends FormRequest
{
    private const CONTENT = 'content';
    private const FILE = 'file';

    public function rules()
    {
        return [
            self::CONTENT => 'nullable|string',
            self::FILE => 'nullable|file',
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
