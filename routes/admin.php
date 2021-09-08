<?php


Route::group(['middleware' => ['role:Admin']], function () {
    Route::resource('post','PostController');
    Route::resource('tag','TagController');
    Route::resource('comment','CommentController');
    Route::resource('widget','WidgetController');
});

