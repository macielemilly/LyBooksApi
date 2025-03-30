<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class,'index'])->name('home');

//->middleware(['auth', 'verified'])

//Editora
Route::get('/editoras', [EditorController::class,'index'])->name('editoras.index');
Route::get('/editoras/create', [EditorController::class,'create'])->name('editoras.create');
Route::post('/editoras', [EditorController::class,'store'])->name('editoras.store');
Route::get('/editoras{editor}', [EditorController::class,'show'])->name('editoras.show');
Route::get('/editoras/{editor}/edit', [EditorController::class,'edit'])->name('editoras.edit');
Route::put('/editoras/{editor}', [EditorController::class,'update'])->name('editoras.update');
Route::delete('/editoras/{editor}', [EditorController::class,'destroy'])->name('editoras.destroy');

Route::get('/languages', [LanguageController::class,'index'])->name('languages.index');
Route::get('/languages/create', [LanguageController::class,'create'])->name('languages.create');
Route::post('/languagens', [LanguageController::class,'store'])->name('languages.store');
Route::get('/languages{language}', [LanguageController::class,'show'])->name('languages.show');
Route::get('/languages/{language}/edit', [languageController::class,'edit'])->name('languages.edit');
Route::put('/languages/{language}', [languageController::class,'update'])->name('languages.update');
Route::delete('/languages/{language}', [languageController::class,'destroy'])->name('languages.destroy');

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
