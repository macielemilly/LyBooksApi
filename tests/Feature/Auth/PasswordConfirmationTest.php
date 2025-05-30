<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_can_be_confirmed(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'), // garante senha correta
        ]);

        $response = $this->actingAs($user)->postJson('/auth/confirm-password', [
            'password' => 'password',
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Senha confirmada com sucesso.',
                 ]);
    }

    public function test_password_is_not_confirmed_with_invalid_password(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        $response = $this->actingAs($user)->postJson('/auth/confirm-password', [
            'password' => 'wrong-password',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('password');
    }
}
