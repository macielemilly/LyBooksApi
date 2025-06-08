<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Genero;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GeneroControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_lista_generos()
    {
        Genero::factory()->count(3)->create();

        $response = $this->getJson('/api/generos');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    public function test_cria_genero_com_sucesso()
    {
        $response = $this->postJson('/api/generos', [
            'nome' => 'Aventura'
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment(['nome' => 'Aventura']);

        $this->assertDatabaseHas('generos', ['nome' => 'Aventura']);
    }

    public function test_nao_cria_genero_duplicado()
{
    Genero::create(['nome' => 'Terror']);

    $response = $this->postJson('/api/generos', [
        'nome' => 'Terror'
    ]);

    $response->assertStatus(422);

    
    $response->assertJsonValidationErrors('nome');

  
    $response->assertJsonFragment([
        'nome' => ['Esse nome de gênero já está em uso.'],
    ]);
}

    public function test_atualiza_genero()
    {
        $genero = Genero::create(['nome' => 'Drama']);

        $response = $this->putJson("/api/generos/{$genero->id}", [
            'nome' => 'Drama Atualizado'
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Gênero atualizado com sucesso']);

        $this->assertDatabaseHas('generos', ['nome' => 'Drama Atualizado']);
    }

    public function test_deleta_genero()
    {
        $genero = Genero::create(['nome' => 'Fantasia']);

        $response = $this->deleteJson("/api/generos/{$genero->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Gênero deletado com sucesso']);

        $this->assertDatabaseMissing('generos', ['id' => $genero->id]);
    }
}

