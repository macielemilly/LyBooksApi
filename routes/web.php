<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EditorController;
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
