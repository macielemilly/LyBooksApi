<?php

namespace App\Http\Controllers;

use App\Models\Author; 
use Illuminate\Http\Request;
use App\Http\Requests\StoreAuthorRequest;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return response()->json($authors, 200);
    }

    public function store(StoreAuthorRequest $request)
    {
        $author = Author::create([
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
        ]);

        if ($author) {
            return response()->json([
                'message' => 'Autor criado com sucesso',
                'author' => $author
            ], 201);
        }

        return response()->json(['message' => 'Erro ao criar autor'], 500);
    }

    public function show(string $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Autor não encontrado'], 404);
        }

        return response()->json($author, 200);
    }

    public function update(StoreAuthorRequest $request, string $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Autor não encontrado'], 404);
        }

        $author->update($request->only(['nome', 'descricao']));

        return response()->json([
            'message' => 'Autor atualizado com sucesso',
            'author' => $author
        ], 200);
    }

    public function destroy(string $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Autor não encontrado'], 404);
        }

        $author->delete();

        return response()->json(['message' => 'Autor deletado com sucesso'], 200);
    }
}