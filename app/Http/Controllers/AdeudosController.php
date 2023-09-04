<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Rules\InValues; 
// use App\Models\DuaModel;
// use App\Models\ColoniaModel;
// use App\Models\SubduaModel;
use App\Models\AnuncioModel;
use App\Models\AdeudosModel;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Validator;


class AdeudosController extends Controller
{
    public function __construct()  //! Clase  47
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($dua, $nomdua, $subdua, $nomsubdua, $sububicaion)
    {
       // <a href="{{ route('duas.create')  }}" class="btn btn-success">Crea nuevo Dua</a>
       // dd($dua);  
        return  view('adeudos.adeudosGenera')->with(['dua' => str_pad($dua, 6, '0', STR_PAD_LEFT),  'nomdua' => $nomdua, 'subdua' => str_pad($subdua, 6, '0', STR_PAD_LEFT), 'nomsubdua' => $nomsubdua, 'sububicaion' => $sububicaion]);
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function GenaraAdeudos(Request $request, $dua, $subdua)
    {
        $dsanun = new AnuncioModel();
        $DTAnu = $dsanun->FSubDUA($dua, $subdua);

        $sypag = $request->input('LBAñopagado');

        $sycap = $request->input('TBFechaRecibo');
        $sycap = substr($sycap, 0, 4);
        $syade = $request->input('LBAñoGenerado');
        $dyade = (float)$syade;
        $dyade1 = $dyade;
        $syade04 = substr($syade, 0, 4) . "04";

        $iyade = (int)$syade;
        $iyade1 = $iyade;
        $iypag = (int)$sypag;
        $iycap = (int)$sycap;
    }
}
