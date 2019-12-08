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
Route::get('setLocale/{locale}', function ($locale){
    if(in_array($locale, config('app.locales')))
        session(['locale' => $locale]);
    return redirect()->back();
})->name('set_locale');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'SearchController@index')->name('search');
Route::get('/books/view/{id}', 'BookController@index')->name('book');
Route::get('/books/order/{id}', 'BookController@orderBook')->name('book_order')->middleware('role:user');;
Route::get('/cart', 'HomeController@cart')->name('cart');
Route::get('/delete_order/{book_id}', 'HomeController@deleteOrder')->name('delete_order');
Route::get('/admin/menu', 'AdminMenuController@index')->name('admin_menu')->middleware('role:archive_admin,hall_admin');
Route::get('/admin/add_user', 'AdminMenuController@addUser')->name('add_user')->middleware('role:hall_admin');
Route::get('/admin/search_user', 'AdminMenuController@searchUser')->name('search_user');
Route::post('/admin/search_user', 'AdminMenuController@searchUser')->name('search_user');
Route::post('/admin/store_user', 'AdminMenuController@storeUser')->name('store_user')->middleware('role:hall_admin');
Route::get('/admin/add_book', 'AdminMenuController@createBook')->name('create_book')->middleware('role:archive_admin');
Route::post('/admin/store_book', 'AdminMenuController@storeBook')->name('store_book')->middleware('role:archive_admin');
Route::get('/admin/delete_books', 'AdminMenuController@deleteBooks')->name('delete_books')->middleware('role:archive_admin');
Route::get('/admin/delete_book', 'AdminMenuController@deleteBook')->name('delete_book')->middleware('role:archive_admin');
