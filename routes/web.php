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

Route::get('/', 'HomeController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'SearchController@index')->name('search');
Route::get('/books/view/{id}', 'BookController@index')->name('book');
Route::get('/books/order/{id}', 'BookController@orderBook')->name('book_order');
Route::get('/cart', 'HomeController@cart')->name('cart');
Route::get('/delete_order/{book_id}', 'HomeController@deleteOrder')->name('delete_order');
