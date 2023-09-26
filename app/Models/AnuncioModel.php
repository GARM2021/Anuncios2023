<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AnuncioModel extends Model
{
    protected $table = 'anundanuncios'; //! clase 24
    protected $primaryKey = 'cuenta'; //! Clase  24


    public static  $gsDUA;
    public static  $gsDUAnomcol;
    public static  $gsSubDUA;
    public static  $gsUser;
    public static  $gsfechahoy;
    public static  $gsañohoy;
    public static  $gsmeshoy;
    public static  $gsdiahoy;
    public static  $gshorahoy;
    public static  $gsfechacap;
    public static  $gsañocap;
    public static  $gsmescap;
    public static  $gsdiacap;
    public static  $gsycap;
    public static  $gdcuota;
    public static  $gdtasam;
    public static  $gdañohoy;
    public static  $gdmeshoy;
    public static  $gdmeshoy1;
    public static  $gdfechahoy;
    public static  $dlicencia;
    public static  $dconstancia;

    public static  $piini = 0;
    public static  $piocho = 0;

    protected $fillable = [

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


    ];


    public function  fechahoy()
    {
        $diapaso = date('d');
        $mespaso = date('m');
        $añopaso = date('Y');
        $idp = intval($diapaso);
        $imp = intval($mespaso);
        if ($idp < 10) {
            $diapaso = '0' . $diapaso;
        }
        if ($imp < 10) {
            $mespaso = '0' . $mespaso;
        }
        $gsfechahoy = $añopaso . $mespaso . $diapaso;
        $gsañohoy = $añopaso;
        $gsmeshoy = $mespaso;

        // Convertir a decimal
        $gdañohoy = (float)$gsañohoy;
        $gdmeshoy = (float)$gsmeshoy;
        $gdfechahoy = (float)$gsfechahoy;

        $gdcuota = 103.74;
    }


    public function FSubDUA($frmitem)
    {
        $errors = [];
        $datosrecibo = [];
        $ierror = 0;
        $gsDUA = $frmitem["frmdua"];
        $gsSubDUA = $frmitem["frmsubdua"];
        $frmrecibo = $frmitem["frmrecibo"];
        $frmfupago  = $frmitem["frmfupago"];

        $dyini0 = 0;

        $anundanuncios = AnuncioModel::where('dua', $gsDUA)
            ->where('subdua', $gsSubDUA)
            ->where(function ($query) {
                $query->whereNull('fbajax')
                    ->orWhere('fbajax', '=', '')
                    ->orWhere('fbajax', '=', '0   ')
                    ->orWhere('fbajax', '=', '00000000');
            })
            ->get();

        $recibo = IngresdingresosModel::where('recibo', $frmrecibo)
            ->where('fecha', $frmfupago)
            ->first();

        if ($recibo !== null) {

            $datorecibo =  $recibo->nombre . " " . $recibo->concepto_1 . $recibo->concepto_2 . $recibo->concepto_3 ;
            $datosrecibo["datosrecibo"] = $datorecibo;
           
        } else {
           $ierror = 5;
        }
      

        // en este for solo debe considerar la finicio y todo lo demas fuera del for
        for ($i = 0; $i < $anundanuncios->count(); $i++) {
            $arow = $anundanuncios[$i];
            $syini = substr($arow->finicio, 0, 4);
            $dmini = (float)substr($arow->finicio, 4, 2);
            $dyini = (float)$syini;
            $iyini = (int)$syini;

            $sycap = substr($frmitem["iycap"], 0, 4);
            $dycap = (float)$sycap;
            $iycap = (int)$sycap;

            $syade = substr($frmitem["iyade"], 0, 4);
            $dyade = (float)$syade;
            $iyade = (int)$syade;

            if ($dyini0 < $dyini) {

                $dyini0 = $dyini;
            }

            if ($iyini > $frmitem["iypag"]) {
                $ierror += 1;
            }
            // dump($ierror);
            if ($iyini > $iycap) {
                $ierror += 1;
            }
            // dump($ierror);
            if ($frmitem["iypag"] > $frmitem["iyade"]) {
                $ierror += 1;
            }
            // dump($ierror);
            if ($iycap > $iyade) {
                $ierror += 1;
            }
          
        }


        $errors["error"] = "no";
        if ($ierror > 0 && $ierror < 5) {


            $errors["error"] = "error";
            $errors["mensaje"] = "Fecha de pago erronea";
        }
        if ($ierror == 5) {


            $errors["error"] = "error";
            $errors["mensaje"] = "Numero o fecha de Recibo incorrectas. Favor Verificar.";
        }
        if ($ierror == 0) {


            $errors["datorecibo"] = $datorecibo;
            
        }
        return $errors;
    }
    /////////////////////////////

}
