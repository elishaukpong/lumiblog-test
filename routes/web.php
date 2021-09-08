<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index']);
Route::get('/blog/{id}/show', [HomeController::class,'show'])->name('show.post');
Route::get('/blog', [HomeController::class,'posts'])->name('show.post.all');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
