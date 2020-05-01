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

Route::get('/', 'GuestController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/list/messages', 'MessageController@list')->name('message.list');
Route::get('/list/messages/{blog}', 'MessageController@list_blog_messages')->name('message.blog.list');

Route::resource('blog', 'BlogController');
Route::resource('message', 'MessageController');
