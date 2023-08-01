@extends('layouts.master')
@section('content')
    {{-- //! Clase 31 --}}
    <h4>Crea Anuncio OK</h4>

    {{-- @dump($errors)
    @dump($dua) --}}
    <div class="head_uno">
        <h2>Dua {{ $dua }}</h2>
        <h2>Dom. Dua {{ $nomdua }}</h2>
        <h3>Sub Dua {{ $subdua }}</h3>
        <h3>Dom. SubDua {{ $nomsubdua }}</h3>
    </div> <br>
    <div class="div-container">
        <form id="Crea" name="Crea" method="POST" action="{{ route('anuncios.store') }}">
            {{-- //! aqui lo resolvi asi  --}}
            {{-- //! https://es.stackoverflow.com/questions/418419/el-bot%C3%B3n-submit-no-funciona-en-formulario  --}}
            {{-- //! tenia unos elementos form intermedios? y en la lina 299  --}}
            {{--  //! Clase  31 tenia action en lugar de method --}}
            @csrf
            @method('PUT')

            <div tabindex="0" class="form_row highlight-on-hover_g">

                <input class="form-control highlight-on-hover_t" maxlength="60" type="hidden" name="dua"
                    value="{{ $dua }}" requiered>
            </div>


            <div tabindex="0" class="form_row highlight-on-hover_g">

                <input class="form-control highlight-on-hover_t" maxlength="60" type="hidden" name="subdua"
                    value="{{ $subdua }}" requiered>
            </div>


            <div tabindex="0" class="form_row highlight-on-hover_g">

                <input class="form-control highlight-on-hover_t" maxlength="60" type="hidden" value="{{ old('concepto') }}"
                    id="concepto" name="concepto" requiered>

            </div>
            <hr style="border-color: black; border-width: 2px;">
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>numper</label>
                <input class="form-control highlight-on-hover_t" maxlength="60" type="text" value="{{ old('numper') }}"
                    name="numper">




                <label for="fperm">Fecha Permiso:</label>
                <input type="text" value="{{ old('fperm') }}" maxlength="08" id="fperm" name="fperm"
                    placeholder="AAAAMMDD" pattern="[0-9]{8}">
                <small>Format Ejemplo: 20230512</small><br><br>


            </div> <br>


            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Numero de Anuncios Temporales</label>
                <input class="form-control highlight-on-hover_t" maxlength="60" type="hidden" name="num_anun_temp"
                    value="{{ old('num_anun_temp') }}" id="num_anun_temp"><br><br>

                <label>dias</label>
                <input class="form-control highlight-on-hover_t" maxlength="60" type="hidden" value="{{ old('dias') }}"
                    name="dias" id="dias">
            </div> <br>

            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label for="finicio">Fecha Inicio:</label>
                <input type="text" value="{{ old('finicio') }}" maxlength="08"id="finicio" name="finicio"
                    placeholder="AAAAMMDD" pattern="[0-9]{8}">
                <small>Format Ejemplo: 20230512</small><br><br>
            </div> <br>



            <div tabindex="0" class="form_row highlight-on-hover_g">

                <label for="ftermino">Fecha Termino:</label>
                <input type="hidden" value="{{ old('ftermino') }}" maxlength="08"id="ftermino" name="ftermino"
                    placeholder="AAAAMMDD" pattern="[0-9]{8}">
                <small>Format Ejemplo: 20230512</small><br><br>
            </div> <br>

            <hr style="border-color: black; border-width: 2px; ">
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>tipoanuncio</label>
                <input class="form-control highlight-on-hover_t" maxlength="60" readonly type="text"
                    value="{{ old('tipoanuncio') }}" name="tipoanuncio" id="tipoanuncio" requiered>
            </div> <br>

            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Tipo Anuncio</label><br><br>
                <input type="radio" id="html" name="rtipoanuncio" id="RPR" value="PR"
                    onchange="cambiaTipos()">
                {{-- //! Clase  33 --}}
                <label for="html">Propio</label><br><br>
                <input type="radio" id="css" name="rtipoanuncio" id="RAJ" value="AJ"
                    onchange="cambiaTipos()">
                {{-- //! Clase  33 --}}
                <label for="css">Ajeno</label><br><br>
                <input type="radio" id="html" name="rtipoanuncio" id="RTE" value="TE"
                    onchange="cambiaTipos()">
                {{-- //! Clase  33 --}}
                <label for="html">Temporal</label><br><br>
                <input type="radio" id="css" name="rtipoanuncio" id="REL" value="EL"
                    onchange="cambiaTipos()">
                {{-- //! Clase  33 --}}
                <label for="css">Electronico</label><br><br>

            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Adosado No Adosado</label><br><br>
                <label for="html">ADOSADO</label>
                <input type="radio" id="ADOSA" name="ANA" value="A" onchange="cambiaTipos()">
                {{-- //! Clase  33 --}}
                <label for="html">NO ADOSADO</label>
                <input type="radio" id="NADOSA" name="ANA" value="N" onchange="cambiaTipos()">
                {{-- //! Clase  33 --}}
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>vistas</label><br>
                <input class="form-control highlight-on-hover_t" maxlength="10" type="text"
                    value="{{ old('vistas') }}" name="vistas" id="vistas" requiered><br><br>
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>largo</label><br>
                <input class="form-control highlight-on-hover_t" type="text" value="{{ old('largo') }}"
                    maxlength="10" name="largo" id="largo" onchange="cambiaMedidas()" requiered /><br>
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>ancho</label><br>
                <input class="form-control highlight-on-hover_t" type="text" value="{{ old('ancho') }}"
                    maxlength="10" name="ancho" id="ancho" onchange="cambiaMedidas()" requiered /><br><br>
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>area</label><br>
                <input class="form-control highlight-on-hover_t" type="text" value="{{ old('area') }}" readonly
                    maxlength="10" name="area" id="area" requiered />
            </div> <br><br>
            <hr style="border-color: black; border-width: 2px; ">
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Leyenda Anuncio</label>
                <input class="form-control highlight-on-hover_t" maxlength="60" type="text"
                    value="{{ old('leyendaanuncio') }}" name="leyendaanuncio" requiered>
            </div> <br>

           

                {{-- <div class="row"> --}}
                <div class="col-md-4">

                    <input class="form-control highlight-on-hover_t" maxlength="60" type="hidden"
                        value="{{ old('recof') }}" name="recof" requiered>
                </div>



                <div class="col-md-4">


                    <input type="hidden" value="{{ old('fpago') }}" maxlength="08"id="fpago" name="fpago">


                </div>


                <div class="col-md-4">

                    <input type="hidden" value="{{ old('fpagocap') }}" maxlength="08"id="fpagocap" name="fpagocap">


                </div>

                <div class="row">

                    <div tabindex="0" class="form_row highlight-on-hover_g">
                        <input class="form-control highlight-on-hover_t" maxlength="60" type="hidden"
                            value="{{ old('recofcap') }}" name="recofcap">
                    </div> <br>

                    <div tabindex="0" class="form_row highlight-on-hover_g">
                        <input class="form-control highlight-on-hover_t" maxlength="60" type="hidden"
                            value="{{ old('nombrecap') }}" name="nombrecap">

                    </div> <br>

                    <input class="form-control highlight-on-hover_t" maxlength="60" type="hidden"
                        value="{{ old('yearpagocap') }}" name="yearpagocap">

                </div>


                <input type="hidden" value="{{ old('fbajax') }}" maxlength="08"id="fbajax" name="fbajax">

                <input type="hidden" value="{{ old('fnotifica') }}" maxlength="08"id="fnotifica" name="fnotifica">

                <input type="hidden" value="{{ old('freq') }}" maxlength="08"id="freq" name="freq">




                <div tabindex="0" class="form_row highlight-on-hover_g">

                    <input class="form-control highlight-on-hover_t" type="hidden" maxlength="02"
                        value="{{ old('cvereq') }}" id="cvereq" name="cvereq">
                </div>



                <input type="hidden" value="{{ old('fembargo') }}" maxlength="08"id="fembargo" name="fembargo">


                <hr style="border-color: black; border-width: 2px; ">

                <div tabindex="0" class="form_row highlight-on-hover_g">

                    <input class="form-control highlight-on-hover_t" type="hidden" maxlength="02" type="text"
                        value="{{ old('status') }}" id="status" name="status">
                </div> <br>

                <div tabindex="0" class="form_row highlight-on-hover_g">
                    <label>usuario_mov</label>
                    <input class="form-control highlight-on-hover_t" maxlength="60" type="text"
                        value="{{ old('usuario_mov') }}" name="usuario_mov" requiered>
                </div> <br>


                <form action="/action_page.php">

                    <input type="hidden" value="{{ old('fcaptura') }}" maxlength="08" id="fcaptura" name="fcaptura">


                </form>


               
                    <input maxlength="08" type="hidden" value="{{ old('horacap') }}" id="horacap" name="horacap">
                
                <div tabindex="0" class="form_row highlight-on-hover_g">
                    <label>capturista</label>
                    <input class="form-control highlight-on-hover_t" maxlength="60" type="text"
                        value="{{ old('capturista') }}" name="capturista">
                </div> <br>


                <div tabindex="0">
                    <button name="BCrea" type="submit" class="btn btn-primary btn-lg"
                        onclick="document.forms.Crea.submit();">Crea Anuncio</button>
                    {{-- //! aqui lo resolvi en esta pagina --}}
                    {{-- https://es.stackoverflow.com/questions/418419/el-bot%C3%B3n-submit-no-funciona-en-formulario --}}
                    {{--  --}}
                </div> <br>

              

           

        </form>
        <script>
            // Obtén el botón por su nombre o clase, en este caso por su nombre "BCrea"
            window.onload = function() {
                const botonCrea = document.querySelector('button[name="BCrea"]');

                // Agrega un event listener al botón
                botonCrea.addEventListener('click', function(event) {
                    // Evita que se envíe el formulario automáticamente
                    event.preventDefault();

                    // Aquí puedes realizar acciones personalizadas después de hacer clic en el botón
                    var efcaptura = document.getElementById("fcaptura");
                    var ehcaptura = document.getElementById("horacap");
                    var ecvereq = document.getElementById("cvereq");
                    var estatus = document.getElementById("status");
                    var econcepto = document.getElementById("concepto");

                    ecvereq.value = 0;
                    estatus.value = 0;
                    econcepto.value = '2480';

                    const fecha = new Date();

                    const año = fecha.getFullYear();
                    const mes = String(fecha.getMonth() + 1).padStart(2, '0');
                    const dia = String(fecha.getDate()).padStart(2, '0');

                    // return `${año}${mes}${dia}`;

                    const ecaptura = `${año}${mes}${dia}`.padEnd(8, ' ');
                    efcaptura.value = ecaptura;


                    const horas = String(fecha.getHours()).padStart(2, '0');
                    const minutos = String(fecha.getMinutes()).padStart(2, '0');


                    const horacap = `${horas}:${minutos}`.padEnd(8, ' ');

                    ehcaptura.value = horacap;


                    // También puedes enviar el formulario manualmente si lo deseas
                    document.forms.Crea.submit();
                });
            }

            function cambiaTipos() {

                var eftermino = document.getElementById("ftermino");
                var edias = document.getElementById("dias");
                var enum_anun = document.getElementById("num_anun_temp");

                eftermino.type = "hidden";
                edias.type = "hidden";
                enum_anun.type = "hidden";

                var rtipos = document.querySelectorAll('input[name="rtipoanuncio"]');
                var ranas = document.querySelectorAll('input[name="ANA"]');
                var siana = "NO";
                var sana = "C"
                ranas.forEach(function(rana) {
                    if (rana.checked) {
                        sana = rana.value;
                        siana = "SI";
                    }
                });

                var srta;
                rtipos.forEach(function(rtipo) {
                    if (rtipo.checked) {
                        srta = rtipo.value;
                    }
                });

                if (siana == "SI") {


                    if (sana == "A") {
                        if (srta == "PR") {
                            srta = 'AP'
                        }
                        if (srta == "AJ") {
                            srta = 'AA'
                        }

                    }
                    if (sana == "N") {
                        if (srta == "PR") {
                            srta = 'PR'
                        }
                        if (srta == "AJ") {
                            srta = 'AJ'
                        }

                    }


                }

                var vtpoanun = document.getElementById("tipoanuncio");

                vtpoanun.value = srta;

                if (srta == "TE") {

                    edias.type = "text";

                    enum_anun.type = "text";

                    eftermino.type = "text";

                }

            }

            function updateCvecol(value) {
                document.getElementsByName("colonia")[0].value = value;
            }

            function cambiaMedidas(sender, e) {
                try {

                    var gtbancho = document.getElementById("ancho");
                    var sancho = gtbancho.value;
                    var gtblargo = document.getElementById("largo");
                    var slargo = gtblargo.value;
                    var gdancho = parseFloat(sancho);
                    var gdlargo = parseFloat(slargo);

                    var goarea = document.getElementById("area");

                    var gdarea = gdancho * gdlargo;
                    gdarea = gdarea.toFixed(2);

                    var sarea = gdarea.toString();
                    goarea.value = sarea;

                } catch (ex) {
                    var sEx = ex.message.toString();
                    document.write("Mensaje de Error: " + sEx);
                }
            }
        </script>
    @endsection
