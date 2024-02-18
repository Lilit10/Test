<?php


namespace Tests\Feature;

use App\Models\User;
use App\Models\Chat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\Fluent\AssertableJson;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ChatStoreControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_chat_can_be_created()
    {
        Storage::fake('avatars');

        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->json('POST', '/api/chats', [
                'user_id' => $user->id,
                'name' => 'Test Chat',
                'is_group' => true,
                'avatar' => UploadedFile::fake()->image('avatar.jpg'),
            ]);

        $response->assertStatus(201)
            ->assertJson(fn (AssertableJson $json) => $json
                ->has('data')
                ->where('data.name','Test Chat')
                ->where('data.is_group', true)
                ->where('data.avatar', 'avatar.jpg')
                ->etc()
    );

        $this->assertDatabaseHas('chats', [
            'name' => 'Test Chat',
            'is_group' => true,
        ]);
    }

    public function test_chat_can_be_created_1()
    {
        Storage::fake('avatars');

        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->json('POST', '/api/chats', [
                'user_id' => $user->id,
                'name' => 'Test Chat',
                'is_group' => true,
                'avatar' => null,
            ]);

        $response->assertStatus(201)
            ->assertJson(fn (AssertableJson $json) => $json
                ->has('data')
                ->where('data.name','Test Chat')
                ->where('data.is_group', true)
                ->where('data.avatar', null)
                ->etc()
            );

        $this->assertDatabaseHas('chats', [
            'name' => 'Test Chat',
            'is_group' => true,
        ]);
    }
}
