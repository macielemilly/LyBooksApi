<?php

namespace App\Http\Controllers;
use App\Models\Editor; 
use Illuminate\Http\Request;

class EditorController extends Controller
{
    
    public readonly Editor $editor;

    public function __construct(){
        $this->editor = new Editor();
    }

    public function index()
    {

        $editoras = $this->editor->all();
        return view('editor', ['editoras' => $editoras]);
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
    public function store(Request $request)
    {
        $created = $this->editor->create([
            'nome' => $request->input('nome'), 
        ]);

        if($created){
           return redirect()->route('editoras.index')->with('message', 'Editora "' . $created->nome  . '" criado com sucesso');
        }

        return redirect()->route('editoras.index')->with('message','Erro ao criar');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
