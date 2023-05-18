<?php

namespace App\Http\Controllers;

use App\Models\SubduaModel;
use App\Models\DuaModel;
use App\Models\ColoniaModel;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

class SubduaController extends Controller
{

   

    public function index()
    {
        
    }

    public function lsubduas($dua)
    {
        
  
            return view('subdua.subduaindex')->with([  //! Clase  29 20230509
                
                'items' => SubduaModel::select(

                    'subdua',
                    'nomsubdua',
                    'dua',
                    'sububicaion',
                    'zona',
                    'colonia',
                   DB::raw("(SELECT nomcol FROM anunmcolonia  WHERE colonia = anunmsubdua.colonia) AS nomcol"),
                    'subeexp',
                    'subtelefono',
                    'subdesgiro',
                    'subusossuelo',
                    'subrfc',
                    'propnom',
                    'propdir',
                    'proptel',
                    'fbajax',
                )
                    ->where('dua', '=', $dua)
                    ->get(),

                  'ditems' =>  DuaModel::findOrFail($dua),
                    
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
        //$icolonia = SubduaModel::where('subdua', $subdua)->value('colonia'); 
        $result = SubduaModel::where('subdua', $subdua)->pluck('colonia', 'dua'); //! Clase  33 con OpenAI pluck
       
        foreach ($result as $clave => $valor) {
            $icolonia =  $valor; //. ", Valor: " . $valor . "<br>"
            $dua = $clave;
        };
       
      
       
        
         return view('subdua.subduaEdit')->with([
            'nomcol' => ColoniaModel::where('colonia', $icolonia)->value('nomcol'),
            'ditems' => DuaModel::findOrFail($dua),
            'items' => SubduaModel::findOrFail($subdua),
            'icolonias' => ColoniaModel::select('colonia', 'nomcol')->where('colonia', '>', '0')->orderBy('nomcol')->get(),
             
        ]);

                  
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
