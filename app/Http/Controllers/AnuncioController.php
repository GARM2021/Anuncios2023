<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DuaModel;
use App\Models\ColoniaModel;
use App\Models\SubduaModel;
use App\Models\AnuncioModel;
use Illuminate\Support\Facades\DB;

class AnuncioController extends Controller
{


    public function index()
    {
    }

    public function lanuncios($subdua)
    {
        $result = SubduaModel::where('subdua', $subdua)->pluck( 'dua', 'nomsubdua'); //! Clase  33 con OpenAI pluck
       
        foreach ($result as $clave => $valor) {
             $dua = $valor;
             $nomsubdua = $clave;
        };

        return view('anuncios.anuncioindex')->with([  //! Clase  29 20230509

            'items' => AnuncioModel::select(

                'cuenta',
                'dua',
                'subdua',
                'concepto',
                'numper',
                'fperm',
                'finicio',
                'ftermino',
                'tipoanuncio',
                'vistas',
                'largo',
                'ancho',
                'area',
                'leyendaanuncio',
                'num_anun_temp',
                'dias',
                'fpago',
                'recof',
                'fpagocap',
                'recofcap',
                'nombrecap',
                'yearpagocap',
                'fbajax',
                'fnotifica',
                'freq',
                'cvereq',
                'fembargo',
                'status',
                'usuario_mov',
                'fcaptura',
                'horacap',
                'capturista',
            )
                ->where('subdua', '=', $subdua)
                ->get(),

                'ditems' =>  DuaModel::findOrFail($dua),
                 'nomsubdua' => $nomsubdua,
                 'subdua' => $subdua,

        ]);
    }


    public function create()
    {

        // return  view('dua.duaCreate')->with(['icolonias' => ColoniaModel::select('colonia', 'nomcol')->where('colonia', '>', '0')->orderBy('nomcol')->get()]);
    }


    public function store(Request $request)
    {

        return $request;
        // $duas = DuaModel::create(request())->all();  //! Clase  32


    }


    public function show($dua)
    {
        dd('estoy en subduaController');
    }


    public function edit($subdua)
    {
        
        // $result = SubduaModel::where('subdua', $subdua)->pluck( 'nomsubdua','dua'); //! Clase  33 con OpenAI pluck 
        
        // foreach ($result as $item) {
        //     $dua = $item->columna1;
        //     $nomsubdua = $item->columna2;
        //  }

        // return view('subdua.subduaEdit')->with([
        //     'ditems' => DuaModel::findOrFail($dua),
        //     'items' => AnuncioModel::findOrFail($subdua),
        //     'nomsubdua' => $nomsubdua,
        //     'subdua' => $subdua,

            
        // ]);
    }


    public function update(Request $request, $dua)
    {
        return $request;
    }


    public function destroy($dua)
    {
        //
    }
}
