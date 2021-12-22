<?php

/*------------ THIS FILE IS REQUIRED IN WEB.PHP FILE ----------------*/

// Default  login with email and password routes
Route::get('login','Auth\LoginController@getLoginForm')->name('login');
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');

//login with social
Route::get('auth/redirect/{driver}', 'Auth\SocialLoginController@redirect');
Route::get('auth/callback/{driver}', 'Auth\SocialLoginController@callback');











?>
