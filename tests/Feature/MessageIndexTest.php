<?php

namespace Tests\Feature;

use App\Models\Chat;
use App\Models\ChatUsers;
use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Laravel\Passport\Passport;
use Tests\TestCase;

class MessageIndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_list_of_messages()
    {
        $user = User::factory()->create();
        $chat1 = Chat::factory()->create();
        $chat2 = Chat::factory()->create();

        ChatUsers::factory()->create([
            'user_id' => $user->id,
            'chat_id' => $chat1->id,
        ]);
        ChatUsers::factory()->create([
            'user_id' => $user->id,
            'chat_id' => $chat2->id,
        ]);

        $message1 = Message::factory()->create([
            'user_id' => $user->id,
            'chat_id' => $chat1->id,
            'content' => 'test1',
            'file_id' => null,
        ]);

        $message2 = Message::factory()->create([
            'user_id' => $user->id,
            'chat_id' => $chat2->id,
            'content' => 'test2',
            'file_id' => null,
        ]);
        Passport::actingAs($user);

        $response = $this->json('GET', '/api/messages');
        $response->assertOk();

        $response->assertJson(fn(AssertableJson $json) => $json
            ->has('0', fn(AssertableJson $json) => $json
                ->where('content', $message1->content)
                ->where('user_id', $user->id)
                ->where('chat_id', $chat1->id)
                ->etc()
            )
            ->has('1', fn(AssertableJson $json) => $json // Remove the extra -> here
            ->where('content', $message2->content)
                ->where('user_id', $user->id)
                ->where('chat_id', $chat2->id)
                ->etc()
            )
        );
    }
}
