<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');

//Editora
Route::get('/editoras', [EditorController::class,'index'])->name('editoras.index');
Route::get('/editoras/create', [EditorController::class,'create'])->name('editoras.create');
Route::post('/editoras', [EditorController::class,'store'])->name('editoras.store');
Route::get('/editoras{editor}', [EditorController::class,'show'])->name('editoras.show');
Route::get('/editoras/{editor}/edit', [EditorController::class,'edit'])->name('editoras.edit');
Route::put('/editoras/{editor}', [EditorController::class,'update'])->name('editoras.update');
Route::delete('/editoras/{editor}', [EditorController::class,'destroy'])->name('editoras.destroy');

//Linguagens
Route::get('/languages', [LanguageController::class,'index'])->name('languages.index');
Route::get('/languages/create', [LanguageController::class,'create'])->name('languages.create');
Route::post('/languagens', [LanguageController::class,'store'])->name('languages.store');
Route::get('/languages{language}', [LanguageController::class,'show'])->name('languages.show');
Route::get('/languages/{language}/edit', [languageController::class,'edit'])->name('languages.edit');
Route::put('/languages/{language}', [languageController::class,'update'])->name('languages.update');
Route::delete('/languages/{language}', [languageController::class,'destroy'])->name('languages.destroy');

//Gêneros
Route::get('/generos', [GeneroController::class,'index'])->name('generos.index');
Route::get('/generos/create', [GeneroController::class,'create'])->name('generos.create');
Route::post('/generos', [GeneroController::class,'store'])->name('generos.store');
Route::get('/generos{genero}', [GeneroController::class,'show'])->name('generos.show');
Route::get('/generos/{genero}/edit', [GeneroController::class,'edit'])->name('generos.edit');
Route::put('/generos/{genero}', [GeneroController::class,'update'])->name('generos.update');
Route::delete('/generos/{genero}', [GeneroController::class,'destroy'])->name('generos.destroy');

Route::get('/authors', [AuthorController::class,'index'])->name('authors.index');
Route::get('/authors/create', [AuthorController::class,'create'])->name('authors.create');
Route::post('/authors', [AuthorgeController::class,'store'])->name('authors.store');
Route::get('/authors{author}', [AuthorController::class,'show'])->name('authors.show');
Route::get('/authors/{author}/edit', [AuthorController::class,'edit'])->name('authors.edit');
Route::put('/authors/{author}', [AuthorController::class,'update'])->name('authors.update');
Route::delete('/authors/{author}', [AuthorController::class,'destroy'])->name('authors.destroy');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
