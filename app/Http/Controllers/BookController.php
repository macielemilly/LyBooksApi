<?php

namespace App\Http\Controllers;


use App\Models\Genero;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBook;

class BookController extends Controller
{
    public function index()
    {
        // Retorna todos os livros com os relacionamentos
        $books = Book::with(['genero'])->get();

        return response()->json($books);
    }

    public function store(StoreBook $request)
    {
        $data = $request->validated();

        $created = Book::create($data);

        if ($created) {
            return response()->json([
                'message' => 'Livro criado com sucesso',
                'book' => $created
            ], 201);
        }

        return response()->json(['message' => 'Erro ao criar o livro'], 500);
    }

    public function show(Book $book)
    {
        // Retorna o livro com seus relacionamentos
        $book->load(['genero']);
        
        return response()->json($book);
    }

    public function update(StoreBook $request, Book $book)
    {
        $data = $request->validated();

        $updated = $book->update($data);

        if ($updated) {
            return response()->json([
                'message' => 'Livro atualizado com sucesso',
                'book' => $book->fresh()
            ]);
        }

        return response()->json(['message' => 'Erro ao atualizar o livro'], 500);
    }

    public function destroy(Book $book)
    {
        $deleted = $book->delete();

        if ($deleted) {
            return response()->json(['message' => 'Livro deletado com sucesso']);
        }

        return response()->json(['message' => 'Erro ao deletar o livro'], 500);
    }
}


