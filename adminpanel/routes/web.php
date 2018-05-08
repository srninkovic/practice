<?php

Route::get('/', 'PostController@index')->name('home');

Route::get('/create', 'PostController@create');
Route::post('/posts', 'PostController@store');
Route::get('/posts/{post}', 'PostController@show');
Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
