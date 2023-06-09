<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rules\InValues;
use App\Models\DuaModel;
use App\Models\ColoniaModel;
use App\Models\SubduaModel;
use App\Models\AnuncioModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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


    public function edit($cuenta)
    {
        
        $result = AnuncioModel::where('cuenta', $cuenta)->pluck( 'dua', 'subdua'); //! Clase  33 con OpenAI pluck 
   
        
        foreach ($result as $clave => $valor) {
            $dua =  $valor; //. ", Valor: " . $valor . "<br>"
            $subdua = $clave;
        }
        


        return view('anuncios.anuncioEdit')->with([
            'ditems' => DuaModel::findOrFail($dua),
            'sitems' => SubduaModel::findOrFail($subdua),
            'items' => AnuncioModel::findOrFail($cuenta),
      
        ]);
    }


    public function update(Request $request, $cuenta)
    {
        // $validatedData = $request->validate([ 
        //     'cuenta' => ['required', 'numeric', 'size:06'],
        //     'dua' => ['required', 'numeric', 'size:06',],
        //     'subdua' =>  ['required', 'numeric', 'size:06'],
        //     'concepto' => ['required', 'size:06', 'between:min:2480', 'max:2480'],
        //     'numper' => ['required', 'max:10'],
        //     'fperm' => ['required', 'size:08'],
        //     'finicio' => ['required', 'numeric', 'size:08'],
        //     'ftermino' => ['numeric', 'size:08'],
        //     'tipoanuncio' => ['required'],
        //     'vistas' => ['required', 'max:4', 'between:min:1,max:9999'],
        //     'largo' => ['required', 'decimal:02'],
        //     'ancho' => ['required', 'decimal:02'],
        //     'area' => ['required', 'decimal:02'],
        //     'leyendaanuncio' => ['required', ' max:70'],
        //     'num_anun_temp' => ['numeric', 'between:min:0,max:9999'],
        //     'dias' => ['numeric'],
        //     'fpago' => ['numeric', 'size:06'],
        //     'recof' => ['numeric', ' max:20'],
        //     'fpagocap' => ['numeric', 'size:08'],
        //     'recofcap' => ['numeric', 'max:20'],
        //     'nombrecap' => ['max:70'],
        //     'yearpagocap' => ['numeric', 'size:04'],
        //     'fbajax' => ['numeric', 'size:08'],
        //     'fnotifica' => ['numeric', 'size:08'],
        //     'freq' => ['numeric', 'max:08'],
        //     'cvereq' => ['numeric', 'max:20'],
        //     'fembargo' => ['numeric', 'size:08'],
        //     'status' => ['numeric', 'max:20'],
        //     'usuario_mov' => ['max:70'],
        //     'fcaptura' => ['numeric', 'size:08'],
        //     'horacap' => ['max:08'],
        //     'capturista' => ['size:08']


            // 'cuenta' => 'required|numeric|  size:06|',
            // 'dua' => 'required|numeric|  size:06|',  
            // 'subdua' =>  'required|numeric|  size:06|',
            // 'concepto' => 'required| size:06|between:min:2480,max:2480',
            // 'numper' => 'required| max:10|',
            // 'fperm' => 'required|  size:08',
            // 'finicio' => 'required|numeric|  size:08',
            // 'ftermino' => 'numeric|  size:08|',
            // 'tipoanuncio' => 'required',
            // 'vistas' => 'required| max:4|between:min:1,max:9999',
            // 'largo' => 'required| decimal:2',
            // 'ancho' => 'required| decimal:2',
            // 'area' => 'required| decimal:2',
            // 'leyendaanuncio' => 'required| max:70|',
            // 'num_anun_temp' => 'numeric|between:min:0,max:9999',
            // 'dias' => 'numeric',
            // 'fpago' => 'numeric|size:06|',
            // 'recof' => 'numeric| max:20|',
            // 'fpagocap' => 'numeric| size:08|',
            // 'recofcap' => 'numeric| max:20|',
            // 'nombrecap' => ' max:70|',
            // 'yearpagocap' => 'numeric| size:04|',
            // 'fbajax' => 'numeric| size:08|',
            // 'fnotifica' => 'numeric| size:08|',
            // 'freq' => 'numeric| max:08|',
            // 'cvereq' => 'numeric| max:20|',
            // 'fembargo' => 'numeric| size:08|',
            // 'status' => 'numeric| max:20|',
            // 'usuario_mov' => ' max:70',
            // 'fcaptura' => 'numeric| size:08|',
            // 'horacap' => ' max:08|',
            // 'capturista' => ' size:08|'

        // ]);

        
       // return $request;
    }


    public function destroy($dua)
    {
        //
    }
}
