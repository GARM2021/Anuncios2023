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

    // public function actualizarPrecio()
    // {
    //     $fechaActual = new DateTime();
    //     $fechaCompra = $this ->fecha_compra;

    //     $diferencia = $fechaActual->diff($fechaCompra);

    //     if ($diferencia->days > 30) {
    //         $this->precio += $this->precio * 0.10;
    //         $this->save();
    //     }
    // }

    // public function aplicarDescuento()
    // {
    //     if (strpos($this->nombre, 'rebajado') !== false) {
    //         $this->precio -= $this->precio * 0.15;
    //         $this->save();
    //     }
    // }

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
       dd($frmitem);
        // $anundanuncios = AnuncioModel::where('dua', $gsDUA)
        //     ->where('subdua', $gsSubDUA)
        //     ->where(function ($query) {
        //         $query->whereNull('fbajax')
        //             ->orWhere('fbajax', '=', '')
        //             ->orWhere('fbajax', '=', '0   ')
        //             ->orWhere('fbajax', '=', '00000000');
        //     })
        //     ->get();

        //  dd($anundanuncios);

        // return ($anundanuncios);
    }
}
