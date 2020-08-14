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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('posts', 'PostController');
Route::resource('pertanyaan', 'PertanyaanController');
Route::get('/pertanyaan/{pertanyaan}/edit/{jawaban}', 'PertanyaanController@tepat')->name('pertanyaan.tepat');
Route::post('/pertanyaan/{pertanyaan}/jawaban', 'PertanyaanController@jawaban')->name('pertanyaan.jawaban');
Route::post('/komentar/pertanyaan/{pertanyaan}', 'KomentarController@pertanyaan')->name('komentar.pertanyaan');
Route::post('/komentar/jawaban/{jawaban}', 'KomentarController@jawaban')->name('komentar.jawaban');
// Route::resource('postings', 'PostingController')->middleware('auth');



//PACKAGES
// Route::get('/test-dompdf', function(){

//     $pdf = App::make('dompdf.wrapper');
//     $pdf->loadHTML('<h1>Hello World</h1>');
//     return $pdf->stream();

// });
// Route::get('/test-dompdf2', 'PdfController@test');
// Route::get('/posts-export', 'PostController@export');
// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });
