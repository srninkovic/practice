<?php
//website
Route::view('/', 'website');

//admin
Route::get('/admin', 'PostController@index')->name('home');
//c
Route::get('/create', 'PostController@create');
Route::post('/posts', 'PostController@store');
Route::patch('/posts/{post}', 'PostController@update');
Route::put('/posts/{post}', 'PostController@update');
//get
Route::get('/posts/{post}', 'PostController@show');
Route::post('/posts/{post}/comments', 'CommentsController@store');
//rud
Route::get('/posts/edit/{id}', 'PostController@edit')->name('posts.edit');
Route::post('/posts/update/{id}', 'PostController@update')->name('posts.update');
Route::get('/posts/delete/{id}', 'PostController@delete')->name('posts.delete');

//register
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

//login/out
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
