<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnunciosController;
use App\Http\Controllers\DuaController;
use App\Http\Controllers\ColoniaController;
use App\Http\Controllers\SubduaController;
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

Route::get('/pruebaDB', [DuaController::class, 'pruebaDB'] );
// anuncios pendientes
// Route::get('/anuncios', [AnunciosController::class, 'index'])->name('anuncios.index');
// Route::get('/anuncios/create', [AnunciosController::class, 'create'])->name('anuncios.create');

// Route::post('/anuncios','AnunciosController@store')->name('anuncios.store');

// Route::get('/anuncios/{cuenta}','AnunciosController@show')->name('anuncios.show');

// Route::get('/anuncios/{cuenta}/edit', 'AnunciosController@edit')->name('anuncios.edit');


// Route::match(['put', 'patch'], '/anuncios/{anuncio}/update', 'AnunciosController@update')->name('anuncios.update');

// Route::delete('/anuncios/{cuenta}/delete', 'AnunciosController@destroy')->name('anuncios.destroy');


//duas funcionando
// Route::post('/duas', [DuaController::class, 'store'])->name('duas.store');
// Route::get('/duas', [DuaController::class, 'index'] );
// Route::get('/duas/create', [DuaController::class, 'create'] )->name('duas.create');
// Route::get('/duas/edit/{dua}', [DuaController::class, 'edit'] )->name('duas.edit');
// Route::match(['put', 'patch'], '/duas/{dua}/update', [DuaController::class, 'update'])->name('duas.update');

// Route::get('/colonias', [ColoniaController::class, 'index'] );
// Route::get('/duas/{dua}', [DuaController::class, 'show'] )->name('duas.show');

route::resource('duas', 'App\Http\Controllers\DuaController'); //! Clase 49  si
//route::resource('subduas', 'App\Http\Controllers\SubduaController'); //! Clase 49  si
//route::resource('subduas', 'App\Http\Controllers\SubduaController'); //! Clase 49  


//Route::get('/subduas/lista/{dua}', [App\Http\Controllers\SubduaController::class, 'lsubduas'])->name('subduas.lsubduas'); //si
Route::get('subduas/{dua}/lsubduas', [SubduaController::class, 'lsubduas'])->name('subduas.lsubduas');
Route::post('/subduas', [SubduaController::class, 'store'])->name('subduas.store');
Route::get('/subduas/create', [SubduaController::class, 'create'] )->name('subduas.create');
Route::get('/subduas/edit/{subdua?}', [SubduaController::class, 'edit'])->name('subduas.edit');

Route::match(['put', 'patch'], '/subduas/{subdua}/update', [SubduaController::class, 'update'])->name('subduas.update');
Route::get('/subduas/{subdua}', [SubduaController::class, 'show'] )->name('subduas.show');

Route::get('/colonias', [ColoniaController::class, 'index'] );

// Route::resource('subduas', SubduaController::class)->except(['show']);
// Route::get('subduas/{subdua}/lsubduas', [SubduaController::class, 'lsubduas'])->name('subduas.lsubduas');

