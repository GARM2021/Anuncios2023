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
    public function __construct()  //! Clase  47
    {
        $this->middleware('auth');
    }



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
                DB::raw("(SELECT     SUM(area) AS totalarea
                    FROM    anundanuncios  
                    where subdua = anunmsubdua.subdua and fbajax < '01'
                    GROUP BY subdua) AS totalarea"),
            )
                ->where('dua', '=', $dua)
                ->orderBy('totalarea', 'desc')
                ->get(),

            'ditems' =>  DuaModel::findOrFail($dua),

        ]);
    }


    public function create($dua, $nomdua)
    {


        return  view('subdua.subduaCrea')->with(['dua' => $dua,  'nomdua' => $nomdua, 'icolonias' => ColoniaModel::select('colonia', 'nomcol')->where('colonia', '>', '0')->orderBy('nomcol')->get()]);
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'subdua' => 'size:06',
            'nomsubdua' => 'required|max:40',
            'dua' => 'size:06',
            'sububicaion' => 'required|max:40',
            'zona' => 'max:4',
            'colonia' => '',
            'subeexp' => 'required|size:08',
            'subtelefono' => 'required|max:20',
            'subdesgiro' => 'required|max:30',
            'subusossuelo' => 'max:40',
            'subrfc' => 'required|max:20',
            'propnom' => 'required|max:40',
            'propdir' => 'required|max:40',
            'proptel' => 'required|max:20',
            'fbajax' => 'max:8'
        ]);




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


    public function update(Request $request, $subdua)
    {
        return $request;
    }


    public function destroy($dua)
    {
        //
    }
}
