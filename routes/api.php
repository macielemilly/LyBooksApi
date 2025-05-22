<?php

use Illuminate\Http\Request;

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AluguelController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Rotas para Aluguel
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/alugueis', [AluguelController::class, 'index'])->name('alugueis.index');
    Route::post('/alugueis', [AluguelController::class, 'store'])->name('alugueis.store');
    Route::get('/alugueis/{aluguel}', [AluguelController::class, 'show'])->name('alugueis.show');
    Route::put('/alugueis/{aluguel}', [AluguelController::class, 'update'])->name('alugueis.update');
    Route::delete('/alugueis/{aluguel}', [AluguelController::class, 'destroy'])->name('alugueis.destroy');
});

// Rotas para Editoras
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/editoras', [EditorController::class,'index'])->name('editoras.index');
    Route::post('/editoras', [EditorController::class,'store'])->name('editoras.store');
    Route::get('/editoras/{editor}', [EditorController::class,'show'])->name('editoras.show');
    Route::put('/editoras/{editor}', [EditorController::class,'update'])->name('editoras.update');
    Route::delete('/editoras/{editor}', [EditorController::class,'destroy'])->name('editoras.destroy');
});

// Rotas para Linguagens
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/languages', [LanguageController::class,'index'])->name('languages.index');
    Route::post('/languages', [LanguageController::class,'store'])->name('languages.store');
    Route::get('/languages/{language}', [LanguageController::class,'show'])->name('languages.show');
    Route::put('/languages/{language}', [LanguageController::class,'update'])->name('languages.update');
    Route::delete('/languages/{language}', [LanguageController::class,'destroy'])->name('languages.destroy');
});

// Rotas para Gêneros
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/generos', [GeneroController::class,'index'])->name('generos.index');
    Route::post('/generos', [GeneroController::class,'store'])->name('generos.store');
    Route::get('/generos/{genero}', [GeneroController::class,'show'])->name('generos.show');
    Route::put('/generos/{genero}', [GeneroController::class,'update'])->name('generos.update');
    Route::delete('/generos/{genero}', [GeneroController::class,'destroy'])->name('generos.destroy');
});

// Rotas para Autores
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/authors', [AuthorController::class,'index'])->name('authors.index');
    Route::post('/authors', [AuthorController::class,'store'])->name('authors.store');
    Route::get('/authors/{author}', [AuthorController::class,'show'])->name('authors.show');
    Route::put('/authors/{author}', [AuthorController::class,'update'])->name('authors.update');
    Route::delete('/authors/{author}', [AuthorController::class,'destroy'])->name('authors.destroy');
});

// Rotas para Livros
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
});

// Rota de Logout (Remover se for API apenas, pois é para sessões)
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum')->name('logout');

// A rota principal de acesso para a API (root)
Route::get('/', function () {
    return response()->json(['message' => 'Welcome to the API!']);
});

