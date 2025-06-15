<?php

namespace Tests\Unit;

use App\Models\Genero;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GeneroTest extends TestCase
{
    use RefreshDatabase;

    public function test_cria_genero_com_sucesso()
    {
        $genero = Genero::create(['nome' => 'Romance']);

        $this->assertDatabaseHas('generos', ['nome' => 'Romance']);
        $this->assertEquals('Romance', $genero->nome);
    }

    public function test_nome_do_genero_deve_ser_string()
    {
        $genero = new Genero(['nome' => 'Ficção']);
        $this->assertIsString($genero->nome);
    }

    public function test_atualiza_genero()
    {
        $genero = Genero::create(['nome' => 'Ação']);
        $genero->update(['nome' => 'Ação Atualizada']);

        $this->assertDatabaseHas('generos', ['nome' => 'Ação Atualizada']);
    }

    public function test_remove_genero()
    {
        $genero = Genero::create(['nome' => 'Suspense']);
        $genero->delete();

        $this->assertDatabaseMissing('generos', ['nome' => 'Suspense']);
    }

    public function test_nao_deve_permitir_nome_duplicado()
    {
        Genero::create(['nome' => 'Terror']);

        $this->expectException(\Illuminate\Database\QueryException::class);

        Genero::create(['nome' => 'Terror']); 
    }
}

