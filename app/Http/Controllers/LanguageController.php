<?php

namespace App\Http\Controllers;
use App\Models\Language; 
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public readonly Language $language;

    public function __construct(){
        $this->language = new Language();
    }

    public function index()
    {
        $languages = $this->language->all();
        return view('language', ['languages' => $languages]);
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
        $created = $this->language->create([
            'name' => $request->input('name'), 
        ]);

        if($created){
            return redirect()->route('languages.index')->with('message', 'Language "' . $created->name . '" created successfully');
        }

        return redirect()->route('languages.index')->with('message', 'Error creating language');
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {
        return view('language_show', ['languages' => $language]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        return view('language_edit', ['languages' => $language]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = Language::where('id', $id)->update($request->except(['_token', '_method']));

        if($updated){
            return redirect()->route('languages.index')->with('message', 'Updated successfully');
        }

        return redirect()->route('languages.index')->with('message', 'Error updating language');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->language->where('id', $id)->delete();

        return redirect()->route('languages.index')->with('message', 'Deleted successfully');
    }
}

