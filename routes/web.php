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
Route::get('/admin/menu', 'AdminMenuController@index')->name('admin_menu');
Route::get('/admin/add_user', 'AdminMenuController@addUser')->name('add_user');
Route::get('/admin/search_user', 'AdminMenuController@searchUser')->name('search_user');
Route::post('/admin/search_user', 'AdminMenuController@searchUser')->name('search_user');
Route::post('/admin/store_user', 'AdminMenuController@storeUser')->name('store_user');
Route::get('/admin/add_book', 'AdminMenuController@createBook')->name('create_book');
Route::post('/admin/store_book', 'AdminMenuController@storeBook')->name('store_book');
