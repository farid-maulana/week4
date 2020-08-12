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

Route::resource('posts', 'PostController');
Route::resource('pertanyaan', 'PertanyaanController');
Route::get('/pertanyaan/{pertanyaan}/edit/{jawaban}', 'PertanyaanController@tepat')->name('pertanyaan.tepat');
Route::resource('postings', 'PostingController')->middleware('auth');

Route::get('/test-dompdf', function(){

    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML('<h1>Hello World</h1>');
    return $pdf->stream();

});

//PACKAGES
Route::get('/test-dompdf2', 'PdfController@test');
Route::get('/posts-export', 'PostController@export');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
