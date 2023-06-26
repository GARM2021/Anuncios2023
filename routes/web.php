<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnuncioController; //! 20230518 aqui lo tenia como Anuncios perdi tiempo
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
//Route::get('/subduas/create', [SubduaController::class, 'create'] )->name('subduas.create');
Route::get('/subduas/edit/{subdua}', [SubduaController::class, 'edit'])->name('subduas.edit');
Route::match(['put', 'patch'], '/subduas/{subdua}/update', [SubduaController::class, 'update'])->name('subduas.update');
Route::get('/subduas/{subdua}', [SubduaController::class, 'show'] )->name('subduas.show');
Route::get('/subduas/create/{dua}/{nomdua}', [SubduaController::class, 'create'] )->name('subduas.create');
Route::match(['put', 'patch'], '/subduas/store', [SubduaController::class, 'store'])->name('subduas.store');


Route::get('/colonias/edit/{colonia}', [ColoniaController::class, 'edit'])->name('colonias.edit');
Route::match(['put', 'patch'], '/colonias/{colonia}/update', [ColoniaController::class, 'update'])->name('colonias.update');
Route::get('/colonias', [ColoniaController::class, 'index'] );

Route::get('/anuncios/{subdua?}/lanuncios', [AnuncioController::class, 'lanuncios'])->name('anuncios.lanuncios');
Route::post('/anuncios', [AnuncioController::class, 'store'])->name('anuncios.store');
Route::get('/anuncios/create/{dua}/{nomdua}/{subdua}/{nomsubdua}', [AnuncioController::class, 'create'] )->name('anuncios.create');
Route::get('/anuncios/edit/{cuenta}', [AnuncioController::class, 'edit'])->name('anuncios.edit');
Route::match(['put', 'patch'], '/anuncios/{cuenta}/update', [AnuncioController::class, 'update'])->name('anuncios.update');
Route::match(['put', 'patch'], '/anuncios/store', [AnuncioController::class, 'store'])->name('anuncios.store');


// Route::put('/anuncios/{cuenta}/update', [AnuncioController::class, 'update']) //! maracaba Route [anuncios.update] not defined.  aqui corri php artisan route:clear  me marco error con esta linea por eso la comente y corri el route:clear y reconocia la route que marcaba error
//     ->name('anuncios.update')
//     ->only(['update']);

Route::get('/anuncios/{cuenta}', [AnuncioController::class, 'show'] )->name('anuncios.show');
  






// Route::resource('subduas', SubduaController::class)->except(['show']);
// Route::get('subduas/{subdua}/lsubduas', [SubduaController::class, 'lsubduas'])->name('subduas.lsubduas');

