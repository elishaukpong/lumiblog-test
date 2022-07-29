<?php


Route::group(['middleware' => ['role:Admin']], function () {
    Route::get('/dashboard','AdminController@index')->name('dashboard');
    Route::resource('post','PostController');
    Route::resource('tag','TagController');
    Route::resource('comment','CommentController');
    Route::resource('path', 'UrlController');
    Route::resource('column', 'ColumnController')->except(['index']);
    Route::resource('variant', 'ColumnVariantController')->except(['index']);
    Route::resource('composition', 'ColumnVariantController')->except(['index']);
});

