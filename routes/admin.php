<?php


Route::group(['middleware' => ['role:Admin']], function () {
    Route::get('/dashboard','AdminController@index')->name('dashboard');
    Route::resource('post','PostController');
    Route::resource('tag','TagController');
    Route::resource('comment','CommentController');
    Route::resource('widget','WidgetController');
});

