<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Editor;
use App\Models\Genero;
use App\Models\Language;


class HomeController extends Controller
{
    public function index(){

        $totalEditoras = Editor::count();
        $totalGeneros = Genero::count();
        $totalLanguages = Language::count();

        return view('dashboard', [
            'total_editoras' => $totalEditoras,
            'total_generos' => $totalGeneros,
            'total_languages' => $totalLanguages,
        ]);
        
    }
}
