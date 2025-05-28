<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreGenero;
use App\Models\Genero;
use Illuminate\Http\Request;


class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generos = Genero::all();  // Usando o método 'all' diretamente no modelo
        return response()->json(['generos' => $generos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenero $request)
    {
        
        $created = Genero::create([
            'nome' => $request->input('nome'),
        ]);

        if ($created) {
            return response()->json([
                'message' => 'Gênero "' . $created->nome . '" criado com sucesso',
                'genero' => $created,
            ], 201); // HTTP Status 201 Created
        }
        return response()->json([
            'message' => 'Erro ao criar o gênero',
        ], 500); // HTTP Status 500 Internal Server Error
    }

    /**
     * Display the specified resource.
     */
    public function show(Genero $genero)
    {
        return response()->json($genero);
    }

    /**
     * Update the specified resource in storage.
     */
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
        ], 500); // HTTP Status 500 Internal Server Error
    }

    /**
     * Remove the specified resource from storage.
     */
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
        ], 500); // HTTP Status 500 Internal Server Error
    }
}


