<?php

use Illuminate\Support\Facades\Route;

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

Route::get ('/', ['uses'=>'AdminController@index', 'as'=>'home']);
Route::get ('/event_page/{id}', ['uses'=>'AdminController@show', 'as'=>'event_page']);

