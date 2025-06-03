<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

   public function test_profile_page_is_displayed(): void
{/** @var \App\Models\User $user */
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user, 'sanctum')
        ->getJson('/api/auth/profile'); 

    $response->assertOk()
             ->assertJson([
                 'id' => $user->id,
                 'email' => $user->email,
             ]);
}

public function test_profile_information_can_be_updated(): void
{/** @var \App\Models\User $user */
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user, 'sanctum')
        ->patchJson('/api/auth/profile', [
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

    $response->assertStatus(200)
             ->assertJson([
                 'message' => 'Perfil atualizado com sucesso.',
                 'user' => [
                     'name' => 'Test User',
                     'email' => 'test@example.com',
                 ],
             ]);

    $user->refresh();

    $this->assertSame('Test User', $user->name);
    $this->assertSame('test@example.com', $user->email);
    $this->assertNull($user->email_verified_at);
}

public function test_user_can_delete_their_account(): void
{/** @var \App\Models\User $user */
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user, 'sanctum')
        ->deleteJson('/api/auth/profile', [
            'password' => 'password',
        ]);

    $response->assertStatus(200)
             ->assertJson([
                 'message' => 'Conta deletada com sucesso.',
             ]);

   
    $this->assertNull($user->fresh());
}

public function test_correct_password_must_be_provided_to_delete_account(): void
{/** @var \App\Models\User $user */
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user, 'sanctum')
        ->deleteJson('/api/auth/profile', [
            'password' => 'wrong-password',
        ]);

    $response->assertStatus(422)
             ->assertJsonValidationErrors('password');

    $this->assertNotNull($user->fresh());
}

}
