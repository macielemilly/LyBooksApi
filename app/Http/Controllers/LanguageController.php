<?php

namespace App\Http\Controllers;
use App\Models\Language; 
use Illuminate\Http\Request;
use App\Http\requests\StoreLanguage;

class LanguageController extends Controller
{
    public readonly Language $language;

    public function __construct(){
        $this->language = new Language();
    }

    public function index()
    {
        $languages = $this->language->all();
        return view('Language/language', ['languages' => $languages]);
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
    public function store(StoreLanguage $request)
    {
        $created = $this->language->create([
            'idioma' => $request->input('idioma'), 
        ]);

        if($created){
            return redirect()->route('languages.index')->with('message', 'Idioma "' . $created->idioma  . '" criado com sucesso');
        }

        return redirect()->route('languages.index')->with('message','Erro ao criar Idioma');
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {
        return view('Language/language_show', ['languages' => $language]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        return view('Language/language_edit', ['languages' => $language]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreLanguage $request, string $id)
    {
        $updated = Language::where('id', $id)->update($request->except(['_token', '_method']));

        if($updated){
            return redirect()->route('languages.index')->with('message', 'Atualizado com sucesso');
        }

        return redirect()->route('languages.index')->with('message', 'Error updating language');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->language->where('id', $id)->delete();

        return redirect()->route('languages.index')->with('message', 'Deletado com sucesso');
    }
}

