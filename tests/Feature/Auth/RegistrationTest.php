<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_users_can_register(): void
    {
        $response = $this->postJson('/api/auth/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);

        $response->assertJsonStructure([
            'user' => [
                'id', 'name', 'email', 'created_at', 'updated_at'
            ],
            'token'
        ]);
    }

    public function test_registration_requires_valid_data(): void
    {
        $response = $this->postJson('/api/auth/register', [
            'name' => '',
            'email' => 'invalid-email',
            'password' => 'short',
            'password_confirmation' => 'different',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name', 'email', 'password']);
    }

    public function test_email_must_be_unique(): void
    {
        User::factory()->create(['email' => 'test@example.com']);

        $response = $this->postJson('/api/auth/register', [
            'name' => 'Another User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['email']);
    }
}

