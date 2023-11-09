<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


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
        $letrero = "gdfechahoy 103" . $gdfechahoy;
        dump($letrero);
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

            $datorecibo =  $recibo->nombre . " " . $recibo->concepto_1 . $recibo->concepto_2 . $recibo->concepto_3;
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
            $errors["mensaje"] = "ERROR: Verifique Año Pagado y Año Generado ";
        }
        if ($ierror == 5) {


            $errors["error"] = "error";
            $errors["mensaje"] = "Numero o fecha de Recibo incorrectas. Favor Verificar.";
        }
        if ($ierror == 0) {


            $errors["datorecibo"] = $datorecibo;
        }
        if ($ierror > 5) {


            $errors["error"] = "error";
            $errors["mensaje"] = "ERROR: Verifique Año Pagado y Año Generado " . " y Numero o fecha de Recibo incorrectas";
        }
        return $errors;
    }

    public function FCalAnun($frmitem)
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

        $errors = [];
        $datosrecibo = [];

        $ierror = 0;
        $gsDUA = $frmitem["frmdua"];
        $gsSubDUA = $frmitem["frmsubdua"];
        $frmrecibo = $frmitem["frmrecibo"];
        $frmfupago  = $frmitem["frmfupago"];
        $syade = substr($frmitem["iyade"], 0, 4);
        $dyade = (float)$syade;

        $dyini0 = 0;

        $anundanuncios = AnuncioModel::where('dua', $gsDUA)
            ->where('subdua', $gsSubDUA)
            ->where(function ($query) {
                $query->whereNull('fbajax')
                    ->orWhere('fbajax', '=', '')
                    ->orWhere('fbajax', '=', '0   ')
                    ->orWhere('fbajax', '=', '00000000');
            })
            ->orderBy('cuenta', 'asc')
            ->get();


        dump($frmitem);
        // dump($anundanuncios);


        // es la linea 54 del cs

        $anundanuncios = $anundanuncios->sortBy('cuenta'); //!20231017
        dump($anundanuncios);
        foreach ($anundanuncios as $arow) { //! 55 a 729 cs
            $dyade1 =  $frmitem["dyade"];
            $syade05 = $frmitem["syade04"];
            $syade04 = $syade05;

            // dump("arow" . $arow);
            // dump("dyade1 " . $dyade1);
            // dd("syade05 " . $syade05);

            $ifbajax = 0;

            $dbonrec = 0;
            $dbonsan = 0;
            $drezago = 0;
            $drecargo = 0;
            $dsancion = 0;

            $darea = 0;

            $d_meses_acum = 0;
            $dacum_tasa = 0;

            $iyade  =  $frmitem["iyade"];
            $iyade1 =  $frmitem["iyade1"];

            $scuenta = $arow['cuenta'];

            $dvistas = floatval($arow['vistas']);
            $stipoanuncio = $arow['tipoanuncio'];
            $darea = floatval($arow['area']);
            $spaso = $arow['finicio'];
            $dfinicio = floatval($spaso);

            $iyini = (int) substr($spaso, 0, 4);
            $dyini = floatval($iyini);
            $imini = (int) substr($spaso, 4, 2);
            $dmini = floatval($iyini);

            $imini;
            $irecof = (int) $arow['recof'];

            $ifecpag = (int) $arow['fpago'];

            $spaso = $arow['fpago'];
            $spaso = substr($spaso, 0, 4);

            $gdcuota = 103.74;

            //   dump("irecof  " .      $irecof          );
            //   dump("ifbajax " .      $ifbajax);
            //   dump("iyade " .        $iyade);
            //   dump("iyini" .         $iyini);
            //   dump("stipoanuncio" .  $stipoanuncio);
            // linea 92 en cs 
            if ($irecof > 0) { //! linea 92 a 99 cs 

                if ($ifecpag > 20221231) {
                    $ifbajax = 99999;
                }
            }

            if ($ifbajax != 0) {
                $stipoanuncio = 'xx';
            }
            if ($iyade < $iyini) { // Evita generar adeudos anteriores a la fecha de inicio del anuncio
                $stipoanuncio = 'xx';
            }
            if ($stipoanuncio == 'AP') {
                $dconstancia = $gdcuota;
                $dlicencia = 0;
            }
            if ($stipoanuncio == 'PR') {
                if ($darea < 13) {
                    $dconstancia = $gdcuota;
                    $dlicencia = 0;
                }
            }
            if ($stipoanuncio == 'PR') {
                if ($darea > 12) {
                    $dlicencia = ($darea * 2.5);

                    if ($dlicencia > 50) {
                        $darea = 50;
                    }
                    if ($dlicencia >= 2.5) {
                        if ($dlicencia < 51) {
                            $darea = $dlicencia;
                        }
                    }

                    $dlicencia = (($darea * $dvistas) * $gdcuota);
                    $dconstancia = 0;
                }
            }



            $ipasoaj = 0; //! linea 151 en cs 
            // Trace.Write("358>>>>>>>>>>>>>>");
            if ($stipoanuncio == 'AJ') {
                $ipasoaj = 1;
            }
            if ($stipoanuncio == 'AA') {
                $ipasoaj = 1;
            }

            // dd("ipasoaj" . $ipasoaj);
            //! se movio a 555  // }
            // linea 161 en cs
            if ($ipasoaj == 1) {
                $dlicencia = bcmul($darea, 2.5, 2);
                if ($dlicencia > 50) {
                    $darea = 50;
                }
                if ($dlicencia <= 2.5) {
                    $darea = 2.5;
                }
                if ($dlicencia > 2.5) {
                    if ($dlicencia < 51) {
                        $darea = $dlicencia;
                    }
                }

                $dlicencia = bcmul(bcmul($darea, $dvistas, 2), $gdcuota, 2);
                $dconstancia = 0;
            }

            // Calculo de la licencia para anuncios tipo TE
            if ($stipoanuncio == 'TE') { //linea 185 en cs 
                $ddiast = $arow['ddiast'];
                $dnum_anun = $arow['dnum_anun'];

                $dlicencia = bcmul(bcmul($darea, $ddiast, 2), bcmul(103.74, 0.4, 2), 2);
                $dlicencia = bcmul($dlicencia, $dnum_anun, 2);
                $dconstancia = 0;
                $syade05 = '000000';
                $syade04 = '000000';
                $dbonrec = 0;
                $dbonsan = 0;

                if ($ifecpag > 0) {
                    $stipoanuncio = 'xx';
                }
            }

            // Calculo de la licencia para anuncios tipo EL
            if ($stipoanuncio == 'EL') { //! 209 cs
                $dlicencia = bcmul($darea, 2.5, 2);
                if ($dlicencia > 75) {
                    $darea = 75;
                }
                if ($dlicencia < 2.5) {
                    $darea = 2.5;
                }
                if ($dlicencia > 2.5) {
                    if ($dlicencia < 75) {
                        $darea = $dlicencia;
                    }
                }

                $dlicencia = bcmul(bcmul($darea, $dvistas, 2), $gdcuota, 2);
                $dconstancia = 0;
            }

            // Calculo del rezago, recargos y sanciones
            if ($dconstancia > 0) {
                $drezago = 0;
                $drecargo = 0;
                $dsancion = 0;
                $dbonrec = 0;
                $dbonsan = 0;
                $dlicencia = 0;
            }

            // Calculo del indicador de paso 1
            $ipasouno = 0;
            if ($stipoanuncio != 'TE') {
                $ipasouno++;
            }
            if ($dconstancia == 0) {
                $ipasouno++;
            }
            if ($stipoanuncio != 'xx') { //! 253 cs
                $ipasouno++;
            }

            // Retorno de los resultados

            // dump("anundanuncios" . $anundanuncios);

            dump("scuenta  "   . $scuenta);
            dump("dlicencia "   . $dlicencia);
            dump("dconstancia " . $dconstancia);
            dump("ipasouno "    . $ipasouno);

            /////////////////////////////////////////////////////

            if ($ipasouno == 3) { //! linea if 257 a 315 en cs  if 435 a 475 php

                $sycalc = $frmitem["syade"];

                $dstm = MrecargoModel::where("aniotasa", $sycalc)->get();

                $gdtasam = $dstm[0]["tasamensual"];


                $gdañohoy =  Carbon::now()->year;
                $gdmeshoy =  Carbon::now()->month;
                // dump("gdmeshoy " . $gdmeshoy);
                // dump("dyade1 " . $dyade1);
                // dump("gdañohoy " . $gdañohoy);
                // dump("gdtasam  " . $gdtasam);
                // dump("gdtasam  " . $gdtasam);


                // Calcula los recargos
                if ($dyade1 < $gdañohoy) {
                    $d_meses_acum = ((int)$gdañohoy - (int)$dyade1) * 12 - 3 + $gdmeshoy;
                    $drecargo = bcmul($d_meses_acum, bcmul($dlicencia, bcdiv($gdtasam, 10000)), 2);
                }
                if ($dyade1 == $gdañohoy) {
                    if ($gdmeshoy >= 4) {
                        // $d_meses_acum = (int) $d_meses_acum;
                        // $dlicencia = (float) $dlicencia;
                        // $gdtasam = (float) $gdtasam;
                        $d_meses_acum = ((int)$gdañohoy - (int)$dyade1) * 12 - 3 + $gdmeshoy;

                        // $drecargo = bcmul($d_meses_acum, bcmul($dlicencia, bcdiv($gdtasam, 10000)), 2);
                        $drecargo = round(($d_meses_acum * ($dlicencia * ($gdtasam / 10000))), 0); //! 20231019 ok

                        // dump("d_meses_acum " . $d_meses_acum);
                        // dump("dlicencia  " . $dlicencia);

                        // dump("gdtasam  " . $gdtasam);
                        // dump("drecargo ----->>>" . $drecargo);
                    }
                }

                //     // Calcula la tasa acumulada
                if ($dyade1 < $gdañohoy) { //! 298 cs
                    $d_meses_acum = 12;

                    if ($dyade1 == 1996) {
                        $d_meses_acum = $d_meses_acum - 7;
                    }
                    if ($dyade1 != 1996) {
                        $d_meses_acum = $d_meses_acum - 3;
                    }
                    $dtasa_por = bcmul($d_meses_acum, $gdtasam);
                    $dacum_tasa = bcadd($dacum_tasa, $dtasa_por, 2);
                    $dyade1 = $dyade1 + 1;
                    $iyade1 = $iyade1 + 1;
                }  // linea 313 de cs 


                dump("drecargo 523 ----->>" . $drecargo);
            }


            //  dd( "dacum_tasa"  . $dacum_tasa);

            /////////////////////////////////////////////////////////////

            $dacum_tasa2 = 0; //! 
            $ipaso482  = 0;

            if ($dconstancia > 0) {
                $ipaso482 = 2;
            }

            if ($stipoanuncio == "xx") {

                $ipaso482 = 2;
            }
            if ($stipoanuncio == "TE") {

                $ipaso482 = 2;
            }

            $dtasa_por = 0;
            // dump(
            //     "ipaso482"
            //         . $ipaso482
            // );
            // dump(
            //     "dyade1"
            //         . $dyade1
            // );
            // dump(
            //     "gdañohoy"
            //         . $gdañohoy
            // );
            if ($ipaso482 !=  2) { //! if 334 a 581 cs 

                $syade1 = (string)$dyade1;
                // dump("sycalc inicial  "  . $sycalc);
                // dump("cuenta inicial " .  $arow["cuenta"]);
                // dump("syade1 inicial >>>>>>>>>>>>>>>>>  " . $syade1);

                do {
                    // Trace.Write("494>>>>>>>>>>>>>>");
                    if ($dyade1 != $gdañohoy) {
                        $dtasa_por = 0;
                        $syade1 = (string)$dyade1;
                        // Selecciona ANUNMRECARGO
                        // $tatmw->Faniotasa($dstmw->DTanunmrecargo, $syade1);

                        $dstm = MrecargoModel::where("aniotasa", $syade1)->get();

                        $dtasamensual  = $dstm[0]["tasamensual"];

                        $dtasa_por = bcmul($dtasamensual, 12);
                        $dacum_tasa = bcadd($dacum_tasa, $dtasa_por, 2);
                        $d_meses_acum = $d_meses_acum + 12;
                        $dyade1 = $dyade1 + 1;
                    }
                    // dump("dyade1 do  "  . $dyade1);
                    // dump("dtasa_por  do " . $dtasa_por);
                    // // dump("dacum_tasa do " . $dacum_tasa);
                    // dump("d_meses_acum " . $d_meses_acum);
                    dump("drecargo 588 ----->>" . $drecargo);
                } while ($dyade1 < $gdañohoy); // linea 358 de cs 

                dump("================");
                dump("syade1  " . $syade1);
                dump("dyade1 "  . $dyade1);
                dump("dyade "  . $sycalc);
                dump("dfinicio "  . $dfinicio);
                dump("gdfechahoy "  . $gdfechahoy);
                dump("cuenta 594 " .  $arow["cuenta"]);
                dump("dacum_tasa do " . $dacum_tasa);
                //!este cierra el 515
            }
            //} //! se movio al 633
            if ($dyade1 == $gdañohoy) { //! 361 a 396 de cs 
                $dtasa_por = 0;
                $dtasamensual = 0;
                $syade1 = strval($dyade1);

                // Selecciona ANUNMRECARGO ///////////////////////////////////
                $dstm = MrecargoModel::where("aniotasa", $syade1)->get();
                $dtasamensual  = $dstm[0]["tasamensual"];

                $gdmeshoy1 = $gdmeshoy;

                if ($gdmeshoy < 4) {
                    if ($gdañohoy == $dyade) {
                        $dtasamensual = 0;
                        $gdmeshoy = 0;
                    }
                }

                // Trace::write("531>>>>>>>>>>>>>>");

                if ($gdmeshoy >= 4) {
                    if ($gdañohoy == $dyade) {
                        if ($gdfechahoy == $dfinicio) {
                            $gdmeshoy = $gdmeshoy - 4 + 1;
                        }
                    }
                }

                dump("gdmeshoy 629 "  . $gdmeshoy);
                $dtasa_por = $dtasamensual * $gdmeshoy;
                $dacum_tasa = $dacum_tasa + $dtasa_por;
                $d_meses_acum = $d_meses_acum + $gdmeshoy;
                $gdmeshoy = $gdmeshoy1;
            }
            //! el if de 397 a 579  de cs
            if ($stipoanuncio != "xx") {
                dump(" ");
                $dacum_tasa2 = $dacum_tasa;

                if ($dyade < $gdañohoy) {
                    if ($dconstancia == 0) {
                        $drezago = $dlicencia;
                        $dsancion = $dlicencia;
                        $dlicencia = 0;
                    }
                }

                if ($dyade < $gdañohoy) {
                    if ($dconstancia > 0) {
                        $drezago = $dconstancia;
                        $dsancion = $dconstancia;
                        $dconstancia = 0;
                    }
                }

                if ($dyade < $gdañohoy) {
                    $dsancion = $dlicencia + $dsancion + $dconstancia;
                }

                if ($dyade == $gdañohoy) {
                    $dsancion = 0;
                }

                if ($dyini < $gdañohoy) {
                    $dmini = 0;
                }

                $ipasodos = 0;

                if ($dyade == $gdañohoy) {
                    if ($gdmeshoy >= 4) {
                        $ipasodos++;
                    }

                    if ($dmini <= 4) {
                        $ipasodos++;
                    }

                    if ($dfinicio != $gdfechahoy) {
                        $ipasodos++;
                    }

                    if ($dlicencia > 0) {
                        $ipasodos++;
                    }

                    if ($dyini == $gdañohoy) {
                        $ipasodos = 0;
                    }
                }

                if ($ipasodos == 4) {
                    $drezago = $dlicencia;
                    $dsancion = $dlicencia;
                    $dlicencia = 0;
                }

                $ipasotres = 0;

                if ($dyade == $gdañohoy) {
                    if ($gdmeshoy >= 4) {
                        $ipasotres++;
                    }

                    if ($dmini <= 4) {
                        $ipasotres++;
                    }

                    if ($dfinicio != $gdfechahoy) {
                        $ipasotres++;
                    }

                    if ($dconstancia > 0) {
                        $ipasotres++;
                    }

                    if ($dyini == $gdañohoy) {
                        $ipasotres = 0;
                    }
                }

                if ($ipasotres == 4) {
                    $drezago = $dconstancia;
                    $drecargo = ($dconstancia / 10000) * $dacum_tasa2;
                    $dsancion = $dconstancia;
                    $dconstancia = 0;
                }

                if ($gdfechahoy != $dfinicio) {
                    // Realizar acciones para bonificación
                }

                if ($gdfechahoy == $dfinicio) {
                    $dbonrec = 0;
                    $dbonsan = 0;
                }
            }  //! fin del if 635 a 736 php y  397 a 579 cs

            $dacum_tasa = 0;
            $dacum_tasa2 = 0;

            if ($stipoanuncio == "xx") //! if 585 a 595 cs 
            {
                //Trace.Write("661>>>>>>>>>>>>>>");
                $dlicencia = 0;
                $drezago = 0;
                $drecargo = 0;
                $dsancion = 0;
                $dconstancia = 0;
                $dbonrec = 0;
                $dbonsan = 0;
                //! 20231019 voy aqui y en cs en la 608
            }
            //WHERE     (cuenta = @cuenta) AND (fechaadeuda = @fechaadeuda) ref 120
            dump(" ");
            $adeudos = AdeudosModel::where('cuenta', $scuenta)
                ->where('fechaadeuda', $syade04)
                ->get();

            $irows = count($adeudos);
            $ipaso4 = 0;
            if ($irows == 0) {
                $ipaso4 += 1;
            }
            dump ( "cuenta" 
             . $scuenta
            );
            dump ( "syade04" 
             . $syade04
            );
            dump ( "ipaso4"      
             . $ipaso4
            );
            dump($ipaso4);
            if ($syade04 != "000004") {
                $ipaso4 = $ipaso4 + 1;
            }
            dump($ipaso4);
            if ($stipoanuncio != "xx") {
                $ipaso4 = $ipaso4 + 1;
            }
            dump($ipaso4);
            if ($stipoanuncio == "xx") //20090420
            {
                $ipaso4 = $ipaso4 + 5;
            }
            dump($ipaso4);
            if ($dlicencia == 0) {
                if ($dconstancia > 0) {
                    $drezago = 0;
                    $drecargo = 0;
                    $dsancion = 0;
                    $dconstancia = $dconstancia * 1.40;
                    $dconstancia = round($dconstancia);
                }
            }
            //   } //! inicia foreach en 267

            if ($dyini == $gdañohoy) {
                $drezago = 0;
                $drecargo = 0;
                $dsancion = 0;
            }
            dump(" ");
            $gshorahoy = (string) (date('H:i'));
            $ddlicencia = round($dlicencia, 0);
            $ddrecargo = round($drecargo, 0);
            $ddconstancia = round($dconstancia, 0);

            $ddconstancia = $dconstancia;
            $ddbonvalref = 0;
            $ddbonrez = 0;
            $ddbonrec = $dbonrec;
            $ddbonsan = $dbonsan;
            $ddbonconst = 0;
            dump(" ");
            dump("ipaso4");
            dump($ipaso4);
            if ($ipaso4 == 3) {
                dump(" ");
                $adeudo = new AdeudosModel();

                // Asignar los valores a los atributos del objeto
                $adeudo->cuenta = $scuenta;
                $adeudo->dua = $gsDUA;
                $adeudo->subdua = $gsSubDUA;
                $adeudo->fechaadeuda = $syade04;
                $adeudo->fpago = '0';
                $adeudo->recof = '0';
                $adeudo->fechadescar = ' ';
                $adeudo->valref =       $ddlicencia;
                $adeudo->rezago =       $drezago;
                $adeudo->recargo =      $ddrecargo;
                $adeudo->sancion =      $dsancion;
                $adeudo->gastos = 0;
                $adeudo->constancia =   $ddconstancia;
                $adeudo->bonifvalref =  $ddbonvalref;
                $adeudo->bonifrezago =  $ddbonrez;
                $adeudo->bonifrecargo = $ddbonrec;
                $adeudo->bonifsancion = $ddbonsan; 
                $adeudo->bonifgastos = 0;
                $adeudo->bonifconstancia = $ddbonconst;
                $adeudo->fcaptura = $gsfechahoy;
                $adeudo->horacap = $gshorahoy;
                $adeudo->capturista = auth()->user()->name;
                $adeudo->extra1 = '0';
                $adeudo->extra2 = '0';
                dump(">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>");
                dump (  'scuenta '
                . $scuenta
               ); 
                 dump (  'ddlicencia '
                  . $ddlicencia
                 ); 
                 dump ( 'drezago '
                  . $drezago
                 ); 
                 dump (  'ddrecargo '
                  . $ddrecargo
                 );
                 dump (  'dsancion '
                  . $dsancion
                 );
                 dump (  'ddconstanci '
                  . $ddconstancia
                 );
                dump (  'ddbonvalref '
                 . $ddbonvalref
                );
                dump (  'ddbonrez '
                 . $ddbonrez
                );
               dump (  'ddbonrec '
                . $ddbonrec
               );
             dump (  'ddbonsan '
              .   $ddbonsan
             );
      
                
                // Guardar el objeto
                // $adeudo->save();

            }
        } //! inicia foreach en 267
    }
}
