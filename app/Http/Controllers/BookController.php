<?php

namespace App\Http\Controllers;

use App\Models\Book; 
use Illuminate\Http\Request;
use App\Http\Requests\StoreBook;

class BookController extends Controller
{
    public readonly Book $book;

    public function __construct(){
        $this->book = new Book();
    }

    public function index()
    {
        $books = $this->book->all();
        return view('Book/book', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Book/book_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBook $request)
    {
        $created = $this->book->create([
            'nome' => $request->input('nome'), 
            'descricao' => $request->input('descricao'),
        ]);

        if ($created) {
            return redirect()->route('books.index')->with('message', 'Livro "' . $created->nome  . '" criado com sucesso');
        }

        return redirect()->route('books.index')->with('message', 'Erro ao criar');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('Book/book_show', ['books' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('Book/book_edit', ['books' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBook $request, string $id)
    {
        $updated = Book::where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->route('books.index')->with('message', 'Atualizado com sucesso');
        }

        return redirect()->route('books.index')->with('message', 'Erro ao atualizar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->book->where('id', $id)->delete();

        return redirect()->route('books.index')->with('message', 'Deletado com sucesso');
    }
}
