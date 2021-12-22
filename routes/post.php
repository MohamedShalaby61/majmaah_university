<?php

/*------------ THIS FILE IS REQUIRED IN WEB.PHP FILE ----------------*/


//post routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('posts','Post\PostController@index');
    Route::get('posts/store','Post\PostController@getAddPostForm');
    Route::post('posts/store','Post\PostController@store');
});












?>
