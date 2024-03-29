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
        // dd("AdeudosContreler Create");
        $frmitems = [];
        $frmitems["frmrecibo"] = '000000000000';
        $frmitems["frmfupago"] = '000000000000';
        $frmitems["frmAñoPagado"] = '1999';
        $frmitems["frmAñoGenerado"] = '1999';
        $frmitems["datorecibo"] = ' ';
        // dd($frmitems);

        return  view('adeudos.adeudosGenera')->with(['dua' => str_pad($dua, 6, '0', STR_PAD_LEFT),  'nomdua' => $nomdua, 'subdua' => str_pad($subdua, 6, '0', STR_PAD_LEFT), 'nomsubdua' => $nomsubdua, 'sububicaion' => $sububicaion, 'frmitems' => $frmitems]);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
    }


    public function destroy($id)
    {
        //
    }

    public function GeneraAdeudos(Request $request)
    {

        $dua =  $request->input('dua');
        $subdua =  $request->input('subdua');
        $nomdua      = $request->input('nomdua');
        $subdua      = $request->input('subdua');
        $nomsubdua   = $request->input('nomsubdua');
        $sububicaion = $request->input('sububicaion');
        $frmitem = [];
        $frmitem['frmrecibo'] =  $request->input('recibo');
        $frmitem['frmfupago'] = $request->input('fupago');
        $frmitem['frmAñoPagado'] =  $request->input('AñoPagado');
        $frmitem['frmAñoGenerado'] = $request->input('AñoGenerado');



        $sypag =  $request->input('AñoPagado');


        $frmitem["frmdua"] =  $request->input('dua');
        $frmitem["frmsubdua"] =  $request->input('subdua');

        $sypag =  $request->input('AñoPagado');

        $frmitem["frmsypag"] = $sypag;
        $frmitem["frmiypag"] = (int)$sypag;

        $sycap = $request->input('fupago');
        $frmitem["frmsycap"] =   substr($sycap, 0, 4);

        $syade = $request->input('AñoGenerado');
        $dyade = $syade;


        $iyade = (int)$syade;

        $frmitem["syade"] = $request->input('AñoGenerado');
        $frmitem["dyade"] = $syade;
        $frmitem["dyade1"] =  $dyade;
        $frmitem["syade04"] =  substr($syade, 0, 4) . "04";

        $frmitem["iyade"] = (int)$syade;
        $frmitem["iyade1"] =  $iyade;
        $frmitem["iypag"] = (int)$sypag;
        $frmitem["iycap"] = (int)$sycap;

        $frmitem["datorecibo"] = "**";

        if ($request->input('BCalcula') === 'calcula') {

            $dsacal = new AnuncioModel();
            $DTAnu = $dsacal->FCalAnun($frmitem);
        }

        $dsanun = new AnuncioModel();
        $DTAnu = $dsanun->FSubDUA($frmitem);


        // dd($DTAnu);

        session()->forget('alert');
        if (isset($DTAnu['error']) && $DTAnu['error'] === 'error') {
            session()->flash('alert', $DTAnu['mensaje']);
            $frmitem["datorecibo"] = " ";

            return view('adeudos.adeudosGenera')->with(['dua' => str_pad($dua, 6, '0', STR_PAD_LEFT),  'nomdua' => $nomdua, 'subdua' => str_pad($subdua, 6, '0', STR_PAD_LEFT), 'nomsubdua' => $nomsubdua, 'sububicaion' => $sububicaion, 'frmitems' => $frmitem]);
        }
        if (isset($DTAnu['datorecibo'])) {
            $frmitem["datorecibo"] = $DTAnu["datorecibo"];


            return view('adeudos.adeudosGenera')->with(['dua' => str_pad($dua, 6, '0', STR_PAD_LEFT),  'nomdua' => $nomdua, 'subdua' => str_pad($subdua, 6, '0', STR_PAD_LEFT), 'nomsubdua' => $nomsubdua, 'sububicaion' => $sububicaion, 'frmitems' => $frmitem]);
        }
    }
}
