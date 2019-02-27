<?php

// Páginas estáticas
Route::get('/', 'PagesController@index')->name('root');
Route::get('/contact', 'PagesController@contact')->name('contact')->middleware('auth');
Route::get('/about', 'PagesController@about')->name('about');

// Rutas para la entidad Books
Route::resource('/books', 'BooksController');
Route::resource('/publishers', 'PublisherController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/{user}/books', 'UserBooksController@index')->name('userbooks.index');
