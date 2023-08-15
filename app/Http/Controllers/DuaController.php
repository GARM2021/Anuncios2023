<?php

namespace App\Http\Controllers;

use App\Models\DuaModel;
use App\Models\ColoniaModel;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class DuaController extends Controller
{
    public function __construct()  //! Clase  47
    {
        $this->middleware('auth');
    }

    public function pruebaDB()
    {
        try {

            // echo "Conexión exitosa";
            // $query = DB::connection('anuncios')
            //     ->table('anunmdua')
            //    ->where('dua', '=','000002')
            //    ->first();
            $duas = DB::table('anunmdua')->get();
            return $duas;
            // return $query;
        } catch (\Exception $e) {
            die("Error al conectar: " . $e->getMessage());
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $valor = 0;

            return view('dua.duaindex')->with([  //! Clase  29 20230509

                'items' => DuaModel::select(
                    'dua',
                    'nomdua',
                    'domdua',
                    'colonia',
                    DB::raw("(SELECT nomcol FROM anunmcolonia  WHERE colonia = anunmdua.colonia) AS nomcol"),
                    'ciudad',
                    'prop',
                    'telprop',
                    'rep_legal',
                    'rfc_dua',
                    'seguro',
                    'fechaini',
                    'fechafin',
                    'fbajax',
                    DB::raw("(SELECT     SUM(area) AS totalarea
                    FROM    anundanuncios  
                    where dua = anunmdua.dua and fbajax < '01' 
                    GROUP BY dua) AS totalarea"),

                )
                    ->where('dua', '>', $valor)
                    ->orderBy('totalarea', 'desc')
                    ->get()
            ]);
            
        } catch (\Exception $e) {
            die("Error al conectar: " . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return  view('dua.duaCreate')->with(['icolonias' => ColoniaModel::select('colonia', 'nomcol')->where('colonia', '>', '0')->orderBy('nomcol')->get()]);
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
        $valor = 0;
        // $duas = DB::table('anunmduas')->where('dua', $dua)->get();
        // $items = DuaModel::findOrFail($dua); //! clase 27 
        // return $items;

        return view('dua.duaShow')->with([
            'items' => DuaModel::select(
                'dua',
                'nomdua',
                'domdua',
                'colonia',
                DB::raw("(SELECT nomcol FROM anunmcolonia  WHERE colonia = anunmdua.colonia) AS nomcol"),
                'ciudad',
                'prop',
                'telprop',
                'rep_legal',
                'rfc_dua',
                'seguro',
                'fechaini',
                'fechafin',
                'fbajax',
            )->where('dua', '=', $dua)->first(), //! con get marca error 

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dua)
    {
        $icolonia = DuaModel::where('dua', $dua)->value('colonia'); //! Clase  33 con OpenAI

        return view('dua.duaEdit')->with([
            'nomcol' => ColoniaModel::where('colonia', $icolonia)->value('nomcol'),
            'items' => DuaModel::findOrFail($dua),
            'icolonias' => ColoniaModel::select('colonia', 'nomcol')->where('colonia', '>', '0')->orderBy('nomcol')->get(),

        ]);
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
