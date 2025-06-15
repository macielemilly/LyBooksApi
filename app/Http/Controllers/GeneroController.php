<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenero;
use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index()
    {
        $generos = Genero::all();
        return response()->json($generos);
    }

    public function store(StoreGenero $request)
    {
        $nome = $request->input('nome');

        
        $existe = Genero::where('nome', $nome)->exists();
        if ($existe) {
            return response()->json([
                'message' => 'Não deu certo criar o gênero: já existe um com esse nome.',
            ], 409);
        }

        $created = Genero::create([
            'nome' => $nome,
        ]);

        if ($created) {
            return response()->json([
                'message' => 'Gênero "' . $created->nome . '" criado com sucesso',
                'genero' => $created,
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao criar o gênero',
        ], 500);
    }

    public function show(Genero $genero)
    {
        return response()->json($genero);
    }

    public function update(StoreGenero $request, string $id)
    {
        $updated = Genero::where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return response()->json([
                'message' => 'Gênero atualizado com sucesso',
            ]);
        }

        return response()->json([
            'message' => 'Erro ao atualizar o gênero',
        ], 500);
    }

    public function destroy(string $id)
    {
        $deleted = Genero::where('id', $id)->delete();

        if ($deleted) {
            return response()->json([
                'message' => 'Gênero deletado com sucesso',
            ]);
        }

        return response()->json([
            'message' => 'Erro ao deletar o gênero',
        ], 500);
    }
    
}
