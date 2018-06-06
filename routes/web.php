<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Custom routes
Route::get('/books', 'BookController@display');
Route::post('/book/delete', 'BookController@deleteAction');
Route::get('/books/delete', 'BookController@deleteActionMultiple');

// Insert a book
Route::get('/book/new', 'BookController@insertForm');
Route::post('/book/new', 'BookController@insertAction');

// Update a book
Route::get('/book/update', 'BookController@updateForm');
Route::post('/book/update', 'BookController@updateAction');

// Base route, require a view named like the URI
Route::get('/{all?}', 'NavigationController@showPage');