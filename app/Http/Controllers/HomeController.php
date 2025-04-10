<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Editor;
use App\Models\Genero;
use App\Models\Language;
use App\Models\Author;
use App\Models\Aluguel;



class HomeController extends Controller
{
    public function index(){

        $totalEditoras = Editor::count();
        $totalGeneros = Genero::count();
        $totalLanguages = Language::count();
        $totalAuthors = Author::count();
        $totalAluguel = Aluguel::count();

        return view('dashboard', [
            'total_editoras' => $totalEditoras,
            'total_generos' => $totalGeneros,
            'total_languages' => $totalLanguages,
            'total_authors' =>  $totalAuthors,
            'total_aluguel' =>   $totalAluguel
        ]);
        
    }
}
