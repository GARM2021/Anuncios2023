<?php

namespace App\Http\Controllers;

use App\Models\SubduaModel;
use App\Models\DuaModel;
use App\Models\ColoniaModel;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class SubduaController extends Controller
{

   

    public function index()
    {
        try {
            // $valor = 0;

            // return view('subdua.subduaindex')->with([  //! Clase  29 20230509

            //     'items' => SubduaModel::select(

            //         'subdua',
            //         'nomsubdua',
            //         'dua',
            //         'sububicaion',
            //         'zona',
            //         'colonia',
            //         DB::raw("(SELECT nomcol FROM anunmcolonia  WHERE colonia = anunmdua.colonia) AS nomcol"),
            //         'subeexp',
            //         'subtelefono',
            //         'subdesgiro',
            //         'subusossuelo',
            //         'subrfc',
            //         'propnom',
            //         'propdir',
            //         'proptel',
            //         'fbajax',
            //     )
            //         ->where('dua', '=', $dua)
            //         ->get(),
            //         'ditems' => DuaModel::findOrFail($dua)
            // ]);
        } catch (\Exception $e) {
             die("Error al conectar: " . $e->getMessage());
         }
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
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // return  view('dua.duaCreate')->with(['icolonias' => ColoniaModel::select('colonia', 'nomcol')->where('colonia', '>', '0')->orderBy('nomcol')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return $request;
        // $duas = DuaModel::create(request())->all();  //! Clase  32


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dua)
    {
       dd('estoy en subduaController');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($subdua)
    {
        // $icolonia = DuaModel::where('dua', $dua)->value('colonia'); //! Clase  33 con OpenAI
        
        // return view('dua.duaEdit')->with([
        //     'nomcol' => ColoniaModel::where('colonia', $icolonia)->value('nomcol'),
        //     'items' => DuaModel::findOrFail($dua),
        //     'icolonias' => ColoniaModel::select('colonia', 'nomcol')->where('colonia', '>', '0')->orderBy('nomcol')->get(),
           
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dua)
    {
          return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($dua)
    {
        //
    }

  
}
