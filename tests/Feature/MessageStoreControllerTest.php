<?php

namespace Tests\Feature;

use App\Models\Chat;
use App\Models\ChatUsers;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class MessageStoreControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_chat_message()
    {
        $user = User::factory()->create();
        $chat = Chat::factory()->create();
        ChatUsers::factory()->create([
            'user_id' => $user->id,
            'chat_id' => $chat->id,
        ]);

        $response = $this->actingAs($user)
            ->json('POST', '/api/messages', [
                'user_id' => $user->id,
                'chat_id' => $chat->id,
                'content' => 'test',
                'file_id' => 1,
            ]);

        $response->assertStatus(201)
            ->assertJson(fn (AssertableJson $json) =>
            $json
                ->where('file_id', null)
                ->has('message', function (AssertableJson $json) use ($user, $chat) {
                    $json
                        ->where('user_id', $user->id)
                        ->where('chat_id', $chat->id)
                        ->where('content', 'test')
                        ->where('file_id', null)
                        ->etc();
                })
            );

        $this->assertDatabaseHas('messages', [
            'user_id' => $user->id,
            'chat_id' => $chat->id,
            'content' => 'test',
            'file_id' => null,
        ]);
    }
}
