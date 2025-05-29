<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_authenticate_using_the_api()
    {
        // Criar um usuário para teste
        $user = User::factory()->create([
            'password' => bcrypt($password = 'password123'),
        ]);

        // Fazer login via API no endpoint correto (api/auth/login)
        $response = $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['token']); // ou conforme sua resposta

        // Você pode salvar o token para usar em outras requisições, se quiser
        $token = $response->json('token');
    }

    public function test_users_cannot_authenticate_with_invalid_password()
    {
        $user = User::factory()->create([
            'password' => bcrypt('correct-password'),
        ]);

        $response = $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        // O status esperado para credenciais erradas é 401 Unauthorized
        $response->assertStatus(401);
    }

    public function test_users_can_logout()
    {
        $user = User::factory()->create();

        // Fazer login para obter token
        $loginResponse = $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => 'password', // Ajuste se usar outra senha no factory
        ]);

        $token = $loginResponse->json('token');

        // Fazer logout autenticado usando Bearer token
        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
                         ->postJson('/api/auth/logout');

        $response->assertStatus(200);
    }
}


