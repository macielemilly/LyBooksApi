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
        
        $user = User::factory()->create([
            'password' => bcrypt($password = 'password123'),
        ]);

        
        $response = $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['token']); 

        
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

        
        $response->assertStatus(401);
    }

    public function test_users_can_logout()
    {
        $user = User::factory()->create();

       
        $loginResponse = $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => 'password', 
        ]);

        $token = $loginResponse->json('token');

        
        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
                         ->postJson('/api/auth/logout');

        $response->assertStatus(200);
    }
}


