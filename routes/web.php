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
Route::get('/test', 'NavigationController@testPage');

// Base route, require a view named like the URI
Route::get('/{all?}', 'NavigationController@showPage');