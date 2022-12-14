<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CollectionController;


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


Auth::routes();

Route::get('/', [App\Http\Controllers\CollectionController::class, 'index'])->name('collection');

Route::resource('films', 'FilmController');
Route::resource('actors', 'ActorController');
Route::resource('collections', 'CollectionController');
Route::resource('collection', 'CommentController');

Route::post('/films/{id}', 'FilmController@star')->name('star');

Route::get('/search', 'FilmController@search')->name('search');





