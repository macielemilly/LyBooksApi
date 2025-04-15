<?php

namespace App\Http\Controllers;
use App\Models\Author; 
use Illuminate\Http\Request;
use App\Http\requests\StoreAuthorRequest;

class AuthorController extends Controller
{
    public readonly Author $author;

    public function __construct(){
        $this->author = new Author();
    }

    public function index()
    {

        $authors = $this->author->all();
        return view('Author/author', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        $created = $this->author->create([
            'nome' => $request->input('nome'), 
            'descricao' => $request->input('descricao'),
        ]);

        if($created){
           return redirect()->route('authors.index')->with('message', 'Author "' . $created->nome  . '" criado com sucesso');
        }

        return redirect()->route('authors.index')->with('message','Erro ao criar');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('Author/author_show',['authors' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('Author/author_edit', ['authors' => $author]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = Author::where('id', $id)->update($request->except(['_token','_method']));

        if($updated){
            return redirect()->route('authors.index')->with('message','Atualizado com sucesso');
        }

        return redirect()->route('authors.index')->with('message','Erro ao atualizar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->author->where('id',$id)->delete();

       return redirect()->route('authors.index')->with('message','Deletado com sucesso');
    }
}