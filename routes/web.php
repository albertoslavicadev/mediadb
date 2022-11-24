<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\FilmController;


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

Route::get('/', [App\Http\Controllers\FilmController::class, 'index'])->name('film');

Route::resource('films', 'FilmController');
Route::resource('actors', 'ActorController');

Route::post('/films/{id}', 'FilmController@star')->name('star');


