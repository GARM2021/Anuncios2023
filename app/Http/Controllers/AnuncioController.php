<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

// use App\Rules\InValues; 
use App\Models\DuaModel;
// use App\Models\ColoniaModel;
use App\Models\SubduaModel;
use App\Models\AnuncioModel;
// use App\Models\AdeudosModel;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Validator;

class AnuncioController extends Controller
{
    public function __construct()  //! Clase  47
    {
        $this->middleware('auth');
    }

    public function index()
    {
    }


    public function lanuncios(SubduaModel $subduas, $subdua) //! Clase  47
    {
       
        $result = $subduas->where('subdua', $subdua)
            ->select('dua', 'subdua', 'nomsubdua', 'sububicaion')
            ->first();

        if ($result) {
            $dua = $result->dua;
            $subdua = $result->subdua;
            $nomsubdua = $result->nomsubdua;
            $sububicaion = $result->sububicaion;
        }
          

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
            'sububicaion' =>  $sububicaion

        ]);
    }


    public function create($dua, $nomdua, $subdua, $nomsubdua, $sububicaion)
    {
        // <a href="{{ route('duas.create')  }}" class="btn btn-success">Crea nuevo Dua</a>
        //dd($dua);  
        return  view('anuncios.anuncioCrea')->with(['dua' => str_pad($dua, 6, '0', STR_PAD_LEFT),  'nomdua' => $nomdua, 'subdua' => str_pad($subdua, 6, '0', STR_PAD_LEFT), 'nomsubdua' => $nomsubdua, 'sububicaion' => $sububicaion]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cuenta' => 'size:06',
            'dua' => 'required|size:06',
            'subdua' =>  'required|size:06',
            'concepto' => 'required|between:04,06',
            'numper' => 'between:0,10', //! required
            'fperm' => 'between:0,8', //! required
            'finicio' => 'between:1,8', //! required
            'ftermino' => 'between:0,8',
            'tipoanuncio' => 'required',
            'vistas' => 'required|between:1,9999',
            'largo' => 'required|decimal:0,2',
            'ancho' => 'required|decimal:0,2',
            'area' => 'required|decimal:0,2',
            'leyendaanuncio' => 'required|between:0,70',
            'num_anun_temp' => 'between:0,9999',
            'dias' => 'between:0,9999',
            'fpago' => 'between:0,8',
            'recof' => 'between:0,12',
            'fpagocap' => 'between:0,8',
            'recofcap' => 'max:20',
            'nombrecap' => 'max:70',
            'yearpagocap' => 'between:0,8',
            'fbajax' => 'between:0,8',
            'fnotifica' => 'between:0,8',
            'freq' => 'between:0,8',
            'cvereq' => 'numeric|between:0,8',
            'fembargo' => 'between:0,8',
            'status' => 'numeric',
            'usuario_mov' => 'max:70',
            'fcaptura' => 'between:0,8',
            'horacap' => 'between:0,8', //! aqui lo tenia comentado y no se me reflejaba en el request 20230628
            'capturista' => 'between:0,8'

        ]);


        return  $validatedData;
    }


    public function show($cuenta)
    {
        $result = AnuncioModel::where('cuenta', $cuenta)->pluck('dua', 'subdua'); //! Clase  33 con OpenAI pluck 


        foreach ($result as $clave => $valor) {
            $dua =  $valor; //. ", Valor: " . $valor . "<br>"
            $subdua = $clave;
        }



        return view('anuncios.anuncioShow')->with([
            'ditems' => DuaModel::findOrFail($dua),
            'sitems' => SubduaModel::findOrFail($subdua),
            'items' => AnuncioModel::findOrFail($cuenta),

        ]);
    }


    public function edit($cuenta)
    {

        $result = AnuncioModel::where('cuenta', $cuenta)->pluck('dua', 'subdua'); //! Clase  33 con OpenAI pluck 


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


        $validatedData = $request->validate([
            'cuenta' => 'required|size:06',
            'dua' => 'required|size:06',
            'subdua' =>  'required|size:06',
            'concepto' => 'required|between:04,06',
            'numper' => 'between:0,10', //! required
            'fperm' => 'between:0,8', //! required
            'finicio' => 'between:1,8', //! required
            'ftermino' => 'between:0,8',
            'tipoanuncio' => 'required',
            'vistas' => 'required|between:1,9999',
            'largo' => 'required|decimal:0,2',
            'ancho' => 'required|decimal:0,2',
            'area' => 'required|decimal:0,2',
            'leyendaanuncio' => 'required|between:0,70',
            'num_anun_temp' => 'between:0,9999',
            'dias' => 'between:0,9999',
            'fpago' => 'between:0,8',
            'recof' => 'between:0,12',
            'fpagocap' => 'between:0,8',
            'recofcap' => 'max:20',
            'nombrecap' => 'max:70',
            'yearpagocap' => 'between:0,8',
            'fbajax' => 'between:0,8',
            'fnotifica' => 'between:0,8',
            'freq' => 'between:0,8',
            'cvereq' => 'numeric|between:0,8',
            'fembargo' => 'between:0,8',
            'status' => 'numeric',
            'usuario_mov' => 'max:70',
            'fcaptura' => 'between:0,8',
            'horacap' => 'between:0,8',
            'capturista' => 'between:0,8'

        ]);


        return  $validatedData;
    }


    public function destroy($dua)
    {
        //
    }




      // public function lanuncios(SubduaModel $subduas, $subdua)
    // {
    //     //   $result = SubduaModel::select('dua',  'subdua', 'nomsubdua', 'sububicaion')->get(); 

    //      $result = $subduas::where('subdua', $subdua)
    //     // $result = SubduaModel::where('subdua', $subdua)
    //         ->select('dua',  'subdua', 'nomsubdua', 'sububicaion')
    //         ->get();
    //     // dd($result);

    //     foreach ($result as $valor) {
    //         $dua = $valor->dua;
    //         $subdua = $valor->subdua;
    //         $nomsubdua = $valor->nomsubdua;
    //         $sububicaion = $valor->sububicaion;
    //     }



    // $result = SubduaModel::where('subdua', $subdua)->pluck( 'dua', 'nomsubdua'); //! Clase  33 con OpenAI pluck

    // foreach ($result as $clave => $valor) {
    //      $dua = $valor;
    //      $nomsubdua = $clave;
    // };

    


}
