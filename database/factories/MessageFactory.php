<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\User;
use App\Models\Chat;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'chat_id' => Chat::factory(),
            'content' => $this->faker->sentence,
            'file_id' => null,
        ];
    }
}

