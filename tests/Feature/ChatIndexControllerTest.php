<?php

namespace Tests\Feature;

use Illuminate\Testing\Fluent\AssertableJson;
use App\Models\User;
use App\Models\Chat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ChatIndexControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_list_of_chats()
    {
        $user = User::factory()->create();
        $chat1 = Chat::factory()->create([
            'user_id' => $user->id,
            'name' => 'Test Chat2',
            'is_group' => true,
        ]);
        $chat2 = Chat::factory()->create([
            'user_id' => $user->id,
            'name' => 'Test Chat2',
            'is_group' => true,
        ]);

        Passport::actingAs($user);

        $response = $this->json('GET', '/api/chats');
        $response->assertOk();

        $response->assertJson(fn(AssertableJson $json) => $json
            ->has('0', fn(AssertableJson $json) => $json->where('id', $chat1->id)
                ->where('name', $chat1->name)
                ->etc()
            )
            ->has('1', fn(AssertableJson $json) => $json->where('id', $chat2->id)
                ->where('name', $chat2->name)
                ->etc()
            )
            ->etc()
        );
    }
}
