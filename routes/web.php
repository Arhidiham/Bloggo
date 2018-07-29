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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// setup all article routes
Route::get('add', 'ArticleController@create');
Route::post('add', 'ArticleController@store');
Route::get('article', 'ArticleController@index');
Route::get('edit/{id}', 'ArticleController@edit');
Route::post('edit/{id}', 'ArticleController@update');
Route::delete('{id}', 'ArticleController@destroy');

Route::get('/home', 'HomeController@index')->name('home');