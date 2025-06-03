<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PasswordUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_can_be_updated(): void
{/** @var \App\Models\User $user */
    $user = User::factory()->create([
        'password' => bcrypt('password'), // garantir senha correta
    ]);

    $response = $this
        ->actingAs($user, 'sanctum')  // usar guard sanctum para API
        ->putJson('/api/auth/password', [
            'current_password' => 'password',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

    $response
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Senha atualizada com sucesso.'
        ]);

    $this->assertTrue(Hash::check('new-password', $user->refresh()->password));
}

public function test_correct_password_must_be_provided_to_update_password(): void
{/** @var \App\Models\User $user */
    $user = User::factory()->create([
        'password' => bcrypt('password'), // garantir senha correta
    ]);

    $response = $this
        ->actingAs($user, 'sanctum')
        ->putJson('/api/auth/password', [
            'current_password' => 'wrong-password',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

    $response
        ->assertStatus(422) // erro de validação geralmente retorna 422
        ->assertJsonValidationErrors('current_password');
}

}
