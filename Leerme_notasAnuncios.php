<?php 


TODO SOBRE CSS
https://www.youtube.com/watch?v=3yM5uXp-T_0&list=PLOIvuivTitrpFypmFA9PB4ez3fISsh992&index=1&t=494s

paso 17.
20230705
laravel ui vue auth 
https://www.youtube.com/watch?v=tIFkbdgdhKk&t=184s

<<<<<<< HEAD
composer require laravl/ui
=======
composer require laravel/ui
php artisan ui vue --auth
npm install && npm run 

para vue 20230706

npm install laravel-mix --save-dev //! no creo el webpack.mix.js
npm install vue-loader vue-template-compiler --save-dev

20230724
https://www.youtube.com/watch?v=HBmfAc4SS2M minuto 29
>>>>>>> b13887318f23ddee793c3d80e99bc41aa1d2ed3f

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
20230901
genera un ejemplo usando Laravel PDF donde se imprima un encabezado " Encabezado" un campo de nombre y una tabla que detalle clave importe bonificacion y neto = importe - bonificacion  y aparte  y fuera de la tabla un campo de nombre de quien lo elabora 
Ver otras versiones


Claro, aquí tienes un ejemplo de cómo usar Laravel PDF para imprimir un documento con un encabezado, un campo de nombre, una tabla y un campo de nombre de quien lo elabora:

PHP
// Importa el componente PDF
use Illuminate\Support\Facades\PDF;

// Crea un nuevo documento PDF
$pdf = PDF::loadView('pdf.document');

// Agrega el encabezado
$pdf->setTitle('Encabezado');

// Agrega el nombre del usuario
$pdf->text('Nombre: [nombre]', ['align' => 'center']);

// Agrega la tabla
$pdf->table([
    ['Clave', 'Importe', 'Bonificación', 'Neto'],
    ['1', 100, 20, 80],
    ['2', 200, 40, 160],
    ['3', 300, 60, 240],
]);

// Agrega el nombre del elaborador
$pdf->text('Elaborado por: [nombre]', ['align' => 'center']);

// Descarga el documento PDF
$pdf->stream();
Usa el código con precaución. Más información
Este código creará un documento PDF con el siguiente contenido:

Encabezado

Nombre: [nombre]

| Clave | Importe | Bonificación | Neto |
|---|---|---|---|
| 1 | 100 | 20 | 80 |
| 2 | 200 | 40 | 160 |
| 3 | 300 | 60 | 240 |

Elaborado por: [nombre]
Para personalizar el documento, puedes modificar la vista pdf.document. Esta vista contiene el HTML que se usará para generar el documento PDF.

Por ejemplo, puedes agregar estilos CSS para personalizar el aspecto del documento. También puedes agregar contenido dinámico al documento, como el nombre del usuario y el nombre del elaborador.

Aquí hay algunos ejemplos de cómo personalizar el documento:

Para agregar estilos CSS, puedes usar la directiva @style en la vista pdf.document. Por ejemplo, puedes agregar el siguiente código para agregar un borde a la tabla:
HTML
<table class="table table-bordered">
Usa el código con precaución. Más información
Para agregar contenido dinámico al documento, puedes usar la variable data. Esta variable contiene los datos que se pasarán al documento PDF. Por ejemplo, puedes agregar el siguiente código para agregar el nombre del usuario a la vista pdf.document:
HTML
<h1>Encabezado: {{ data.nombre }}</h1>

//-----------------------------------------------------------------------------
20230919
D:\xampp\htdocs\Anuncios2023>php artisan make:model Ingresdingresos

20231107
SELECT     TOP (200) cuenta, dua, subdua, fechaadeuda FROM         anundadeudos
WHERE     (cuenta NOT IN
                          (SELECT     cuenta
                            FROM          anundadeudos AS anundadeudos_1
                            WHERE      (fechaadeuda = '202304')))
ORDER BY fechaadeuda DESC

SUBDUA 001926 20221215	043900057838

  



