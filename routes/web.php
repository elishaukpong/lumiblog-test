<?php

use App\Http\Controllers\{HomeController, CommentController};
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index']);
Route::get('/blog/{id}/show', [HomeController::class,'show'])->name('show.post');
Route::post('/blog/comment/add', [CommentController::class,'store'])->name('post.comment');
Route::get('/blog', [HomeController::class,'posts'])->name('show.post.all');
Route::get('/suggest', [HomeController::class,'suggest'])->name('suggest');
Route::get('/dashboard',[HomeController::class,'dashboard'])->middleware(['auth'])->name('dashboard');

Route::get('pricing', function(){
    return view('sample');
});

require __DIR__.'/auth.php';

Route::fallback(function(){
    return 45;
});
