<?php

namespace App\Http\Controllers;

use App\Models\DuaModel;
use App\Models\ColoniaModel;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class DuaController extends Controller
{

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
                )
                    ->where('dua', '>', $valor)
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
          return  view('dua.duaCreate');
        
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            )->where('dua', '>', $valor)->first() //! con get marca error 
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
        //
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
        //
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
