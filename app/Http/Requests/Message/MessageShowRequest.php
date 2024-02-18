<?php


namespace App\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;

class MessageShowRequest extends FormRequest
{
    private const USER_ID = 'user_id';

    public function rules()
    {
        return [
            self::USER_ID => 'required|exists:users,id',
        ];
    }

    public function getUserId()
    {
        return $this->input(self::USER_ID);
    }
}
