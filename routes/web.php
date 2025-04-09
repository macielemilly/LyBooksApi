<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AluguelController;
use Illuminate\Support\Facades\Route;


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');


Route::get('/alugueis', [AluguelController::class, 'index'])->name('alugueis.index')->middleware(['auth', 'verified']);
Route::get('/alugueis/create', [AluguelController::class, 'create'])->name('alugueis.create')->middleware(['auth', 'verified']);
Route::post('/alugueis', [AluguelController::class, 'store'])->name('alugueis.store')->middleware(['auth', 'verified']);
Route::get('/alugueis/{aluguel}', [AluguelController::class, 'show'])->name('alugueis.show')->middleware(['auth', 'verified']);
Route::get('/alugueis/{aluguel}/edit', [AluguelController::class, 'edit'])->name('alugueis.edit')->middleware(['auth', 'verified']);
Route::put('/alugueis/{aluguel}', [AluguelController::class, 'update'])->name('alugueis.update')->middleware(['auth', 'verified']);
Route::delete('/alugueis/{aluguel}', [AluguelController::class, 'destroy'])->name('alugueis.destroy')->middleware(['auth', 'verified']);

//Editora
Route::get('/editoras', [EditorController::class,'index'])->name('editoras.index')->middleware(['auth', 'verified']);
Route::get('/editoras/create', [EditorController::class,'create'])->name('editoras.create')->middleware(['auth', 'verified']);
Route::post('/editoras', [EditorController::class,'store'])->name('editoras.store')->middleware(['auth', 'verified']);
Route::get('/editoras{editor}', [EditorController::class,'show'])->name('editoras.show')->middleware(['auth', 'verified']);
Route::get('/editoras/{editor}/edit', [EditorController::class,'edit'])->name('editoras.edit')->middleware(['auth', 'verified'])->middleware(['auth', 'verified']);
Route::put('/editoras/{editor}', [EditorController::class,'update'])->name('editoras.update')->middleware(['auth', 'verified']);
Route::delete('/editoras/{editor}', [EditorController::class,'destroy'])->name('editoras.destroy')->middleware(['auth', 'verified']);

//Linguagens
Route::get('/languages', [LanguageController::class,'index'])->name('languages.index')->middleware(['auth', 'verified']);
Route::get('/languages/create', [LanguageController::class,'create'])->name('languages.create')->middleware(['auth', 'verified']);
Route::post('/languagens', [LanguageController::class,'store'])->name('languages.store')->middleware(['auth', 'verified']);
Route::get('/languages{language}', [LanguageController::class,'show'])->name('languages.show')->middleware(['auth', 'verified']);
Route::get('/languages/{language}/edit', [languageController::class,'edit'])->name('languages.edit')->middleware(['auth', 'verified']);
Route::put('/languages/{language}', [languageController::class,'update'])->name('languages.update')->middleware(['auth', 'verified']);
Route::delete('/languages/{language}', [languageController::class,'destroy'])->name('languages.destroy')->middleware(['auth', 'verified']);

//Gêneros
Route::get('/generos', [GeneroController::class,'index'])->name('generos.index')->middleware(['auth', 'verified']);
Route::get('/generos/create', [GeneroController::class,'create'])->name('generos.create')->middleware(['auth', 'verified']);
Route::post('/generos', [GeneroController::class,'store'])->name('generos.store')->middleware(['auth', 'verified']);
Route::get('/generos{genero}', [GeneroController::class,'show'])->name('generos.show')->middleware(['auth', 'verified']);
Route::get('/generos/{genero}/edit', [GeneroController::class,'edit'])->name('generos.edit')->middleware(['auth', 'verified']);
Route::put('/generos/{genero}', [GeneroController::class,'update'])->name('generos.update')->middleware(['auth', 'verified']);
Route::delete('/generos/{genero}', [GeneroController::class,'destroy'])->name('generos.destroy')->middleware(['auth', 'verified']);

Route::get('/authors', [AuthorController::class,'index'])->name('authors.index');
Route::get('/authors/create', [AuthorController::class,'create'])->name('authors.create');
Route::post('/authors', [AuthorController::class,'store'])->name('authors.store');
Route::get('/authors{author}', [AuthorController::class,'show'])->name('authors.show');
Route::get('/authors/{author}/edit', [AuthorController::class,'edit'])->name('authors.edit');
Route::put('/authors/{author}', [AuthorController::class,'update'])->name('authors.update');
Route::delete('/authors/{author}', [AuthorController::class,'destroy'])->name('authors.destroy');


Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
    //return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
