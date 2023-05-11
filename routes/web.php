<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnunciosController;
use App\Http\Controllers\DuaController;
use App\Http\Controllers\ColoniaController;
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
//! Clase 16 20230426 17 20230427

Route::get('/', function () {
    return view('welcome');
})->name('main');

//Route::get('/anuncios', 'AnunciosController@index' )->name('anuncios.index');
//Route::get('/anuncios', [AnunciosController::class, 'index'] )->name('anuncios.index');
Route::get('/anuncios', [AnunciosController::class, 'index'])->name('anuncios.index');
Route::get('/anuncios/create', [AnunciosController::class, 'create'])->name('anuncios.create');

Route::post('/anuncios','AnunciosController@store')->name('anuncios.store');

Route::get('/anuncios/{cuenta}','AnunciosController@show')->name('anuncios.show');

Route::get('/anuncios/{cuenta}/edit', 'AnunciosController@edit')->name('anuncios.edit');


Route::match(['put', 'patch'], '/anuncios/{anuncio}/update', 'AnunciosController@update')->name('anuncios.update');

Route::delete('/anuncios/{cuenta}/delete', 'AnunciosController@destroy')->name('anuncios.destroy');


Route::get('/duas', [DuaController::class, 'index'] );
Route::get('/duas/create', [DuaController::class, 'create'] )->name('duas.create');
Route::post('/duas', [DuaController::class, 'store'])->name('duas.store');
Route::get('/colonias', [ColoniaController::class, 'index'] );
Route::get('/duas/{dua}', [DuaController::class, 'show'] );

Route::get('/pruebaDB', [DuaController::class, 'pruebaDB'] );