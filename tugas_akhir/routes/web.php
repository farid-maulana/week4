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

use Illuminate\Support\Facades\Route;


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/master', function () {
    return view('adminlte.master');
});

Route::get('/items', function () {
    return view('items.index');
});

Route::get('/create', function () {
    return view('items.create');
});

Route::get('/', function () {
    return view('tables.index');
});

Route::get('/data-tables', function () {
    return view('tables.data');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController')->middleware('auth');
Route::resource('pertanyaan', 'PertanyaanController')->middleware('auth');
Route::resource('postings', 'PostingController')->middleware('auth');
