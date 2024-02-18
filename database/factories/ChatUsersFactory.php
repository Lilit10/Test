<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\ChatUsers;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChatUsers>
 */
class ChatUsersFactory extends Factory
{
    protected $model = ChatUsers::class;

    public function definition()
    {
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'chat_id' => function () {
                return Chat::factory()->create()->id;
            },
        ];
    }
}
