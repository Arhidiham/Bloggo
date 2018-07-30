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

// allowing the login routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// removing the register route so that new users cannot be created
// allowing the reset routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', function () {
    return view('welcome');
});

// setup article routes that require auth
Route::get('add', 'ArticleController@create');
Route::post('add', 'ArticleController@store');
Route::get('edit/{id}', 'ArticleController@edit');
Route::post('edit/{id}', 'ArticleController@update');
Route::delete('{id}', 'ArticleController@destroy');
// setup article routes that do not need auth
Route::get('article/{id}', 'ArticleViewController@get');
Route::get('index', 'ArticleViewController@index');