<?php 

paso 17.
20230705
laravel ui vue auth 
https://www.youtube.com/watch?v=tIFkbdgdhKk&t=184s

composer require laravel/ui
php artisan ui vue --auth
npm install && npm run 

para vue 20230706

npm install laravel-mix --save-dev //! no creo el webpack.mix.js
npm install vue-loader vue-template-compiler --save-dev

20230724
https://www.youtube.com/watch?v=HBmfAc4SS2M minuto 29

paso 13.
20230426
D:\xampp\htdocs\Anuncios2023>php artisan key:generate

D:\xampp\htdocs\Anuncios2023>php artisan config:cache  genera el cache de configuracion
D:\xampp\htdocs\Anuncios2023>php artisan config:clear  lo restablece
paso 14 
en laravel 9 ya no se ocupa
paso 15
.env  
APP_URL=http://127.0.0.1.:8000
paso 16
D:\xampp\htdocs\Anuncios2023>php artisan make:controller DuaController --resource

D:\xampp\htdocs\Anuncios2023>php artisan make:controller --help
==================================================================================================

20230621

pasar dua y subdua
1.-  del listado de anuncios x subuda
anuncioindex.blade.php 
<a href="{{ route('anuncios.create', ['dua' => $ditems->dua, 'nomdua' => $ditems->nomdua, 'subdua' => $subdua, 'nomsubdua' => $nomsubdua]) }}" class="btn btn-success">Crea nuevo Anuncio</a>

a

2.- MOdificar el archivo de rutas 
Route::get('/anuncios/create/{dua}/{nomdua}/{subdua}/{nomsubdua}', [AnuncioController::class, 'create'] )->name('anuncios.create');

3.- Modificar el AnuncioController 
public function create($dua, $nomdua, $subdua, $nomsubdua)
  
return  view('anuncios.anuncioCrea')->with(['icolonias' => ColoniaModel::select('colonia', 'nomcol')->where('colonia', '>', '0')->orderBy('nomcol')->get(), 'dua' => $dua,  'nomdua' => $nomdua, 'subdua' => $subdua, 'nomsubdua' => $nomsubdua ]);
    


Vista de Create anuncio

4.- en la anuncioCrea.blade.php guardar los valores pasados en campos hidden 

<div class="form_row">
           
<input class="form-control" maxlength="60" type="hidden" name="dua"  value={{ $dua }} requiered>
</div> <br>


<div class="form_row">

<input class="form-control" maxlength="60" type="hidden" name="subdua"  value={{ $subdua}} requiered>
</div> <br>

===============================================================================================================
20230705

