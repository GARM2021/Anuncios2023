@extends('layouts.master')
@section('content')
    {{-- //! Clase 31 --}}
    <h1>Crea Anuncio</h1>

    {{-- @dump($errors)
    @dump($dua) --}}
    <h1>Dua {{ $dua }}</h1>
    <h1>Dom. Dua {{ $nomdua }}</h1>
    <h2>Sub Dua {{ $subdua }}</h2>
    <h2>Dom. SubDua {{ $nomsubdua }}</h2>


    <form id="Crea" name="Crea" method="POST" action="{{ route('anuncios.store') }}">
        {{-- //! aqui lo resolvi asi  --}}
        {{-- //! https://es.stackoverflow.com/questions/418419/el-bot%C3%B3n-submit-no-funciona-en-formulario  --}}
        {{-- //! tenia unos elementos form intermedios? y en la lina 299  --}}
        {{--  //! Clase  31 tenia action en lugar de method --}}
        @csrf
        @method('PUT')

        <div class="form_row">

            <input class="form-control" maxlength="60" type="hidden" name="dua" value="{{ $dua }}" requiered>
        </div> <br>


        <div class="form_row">

            <input class="form-control" maxlength="60" type="hidden" name="subdua" value="{{ $subdua }}" requiered>
        </div> <br>

        <hr style="border-color: black; border-width: 2px; ">

        {{-- <div class="form_row">
            <label>cuenta</label>
            <input class="form-control" maxlength="60" type = "text"   value="{{ old('subdua')  }}"   name="cuenta" requiered>

          
            <label>dua</label>
            <input class="form-control" maxlength="60" type = "text"   value="{{ old('subdua')  }}"   name="dua" requiered>


            <label>subdua</label>
            <input class="form-control" maxlength="60" type = "text"   value="{{ old('subdua')  }}"   name="subdua" requiered>

        </div> <br> --}}
        <br>
        <div class="form_row">
            <label>concepto</label>
            <input class="form-control" maxlength="60" type="text" value="{{ old('concepto') }}" name="concepto"
                requiered>

        </div> <br> <br>
        <hr style="border-color: black; border-width: 2px;">
        <div class="form_row">
            <label>numper</label>
            <input class="form-control" maxlength="60" type="text" value="{{ old('numper') }}" name="numper">




            <label for="fperm">Fecha Permiso:</label>
            <input type="text" value="{{ old('fperm') }}" maxlength="08" id="fperm" name="fperm"
                placeholder="AAAAMMDD" pattern="[0-9]{8}">
            <small>Format Ejemplo: 20230512</small><br><br>


        </div> <br>


        <div class="form_row">
            <label>Numero de Anuncios Temporales</label>
            <input class="form-control" maxlength="60" type="hidden" name="num_anun_temp"
                value="{{ old('num_anun_temp') }}" id="num_anun_temp"><br><br>

            <label>dias</label>
            <input class="form-control" maxlength="60" type="hidden" value="{{ old('dias') }}" name="dias"
                id="dias">
        </div> <br>

        <label for="finicio">Fecha Inicio:</label><br><br>
        <input type="text" value="{{ old('finicio') }}" maxlength="08"id="finicio" name="finicio"
            placeholder="AAAAMMDD" pattern="[0-9]{8}">
        <small>Format Ejemplo: 20230512</small><br><br>

        </div> <br>

        <div class="form_row">

            <label for="ftermino">Fecha Termino:</label><br><br>
            <input type="hidden" value="{{ old('ftermino') }}" maxlength="08"id="ftermino" name="ftermino"
                placeholder="AAAAMMDD" pattern="[0-9]{8}">
            <small>Format Ejemplo: 20230512</small><br><br>


        </div> <br>
        <hr style="border-color: black; border-width: 2px; ">
        <div class="form_row">
            <label>tipoanuncio</label>
            <input class="form-control" maxlength="60" readonly type="text" value="{{ old('tipoanuncio') }}"
                name="tipoanuncio" id="tipoanuncio" requiered>
        </div> <br>

        <div class="form_row">
            <label>Tipo Anuncio</label><br><br>
            <input type="radio" id="html" name="rtipoanuncio" id="RPR" value="PR" onchange="cambiaTipos()">
            {{-- //! Clase  33 --}}
            <label for="html">Propio</label><br><br>
            <input type="radio" id="css" name="rtipoanuncio" id="RAJ" value="AJ" onchange="cambiaTipos()">
            {{-- //! Clase  33 --}}
            <label for="css">Ajeno</label><br><br>
            <input type="radio" id="html" name="rtipoanuncio" id="RTE" value="TE" onchange="cambiaTipos()">
            {{-- //! Clase  33 --}}
            <label for="html">Temporal</label><br><br>
            <input type="radio" id="css" name="rtipoanuncio" id="REL" value="EL"
                onchange="cambiaTipos()">
            {{-- //! Clase  33 --}}
            <label for="css">Electronico</label><br><br>


        </div> <br>
        <label>Adosado No Adosado</label><br><br>
        <label for="html">ADOSADO</label>
        <input type="radio" id="ADOSA" name="ANA" value="A" onchange="cambiaTipos()">
        {{-- //! Clase  33 --}}
        <label for="html">NO ADOSADO</label>
        <input type="radio" id="NADOSA" name="ANA" value="N" onchange="cambiaTipos()">
        {{-- //! Clase  33 --}}

        {{-- <br><br>   //! aqui voy   --}}


        <div class="form_row">
            <label>vistas</label><br>
            <input class="form-control" maxlength="10" type="text" value="{{ old('vistas') }}" name="vistas"
                id="vistas" requiered><br><br>


            <label>largo</label><br>
            <input class="form-control" type="text" value="{{ old('largo') }}" maxlength="10" name="largo"
                id="largo" onchange="cambiaMedidas()" requiered /><br>


            <label>ancho</label><br>
            <input class="form-control" type="text" value="{{ old('ancho') }}" maxlength="10" name="ancho"
                id="ancho" onchange="cambiaMedidas()" requiered /><br><br>


            <label>area</label><br>
            <input class="form-control" type="text" value="{{ old('area') }}" readonly maxlength="10"
                name="area" id="area" requiered />
        </div> <br><br>
        <hr style="border-color: black; border-width: 2px; ">
        <div class="form_row">
            <label>Leyenda Anuncio</label>
            <input class="form-control" maxlength="60" type="text" value="{{ old('leyendaanuncio') }}"
                name="leyendaanuncio" requiered>
        </div> <br>

        <div class="form_row">
            <hr style="border-color: black; border-width: 2px; ">
            {{-- <div class="row"> --}}
            <div class="col-md-4">
                <label>recof</label>
                <input class="form-control" maxlength="60" type="text" value="{{ old('recof') }}" name="recof"
                    requiered>
            </div> <br>



            <div class="col-md-4">

                <label for="fpago">Fecha Pago:</label><br><br>
                <input type="text" value="{{ old('fpago') }}" maxlength="08"id="fpago" name="fpago"
                    placeholder="AAAAMMDD" pattern="[0-9]{8}">


            </div> <br>


            <div class="col-md-4">


                <label for="fpagocap">Fecha Captura de Pago:</label><br><br>
                <input type="text" value="{{ old('fpagocap') }}" maxlength="08"id="fpagocap" name="fpagocap"
                    placeholder="AAAAMMDD" pattern="[0-9]{8}">
                <small>Format Ejemplo: 20230512</small><br><br>


            </div> <br>




            <div class="row">

                <label>recofcap</label>
                <input class="form-control" maxlength="60" type="text" value="{{ old('recofcap') }}"
                    name="recofcap">


                <label>nombrecap</label>
                <input class="form-control" maxlength="60" type="text" value="{{ old('nombrecap') }}"
                    name="nombrecap">


                <label>yearpagocap</label>
                <input class="form-control" maxlength="60" type="text" value="{{ old('yearpagocap') }}"
                    name="yearpagocap">

            </div> <br>
            <hr style="border-color: black; border-width: 2px; ">



            <label for="fbajax">Fecha Baja:</label><br><br>
            <input type="text" value="{{ old('fbajax') }}" maxlength="08"id="fbajax" name="fbajax"
                placeholder="AAAAMMDD" pattern="[0-9]{8}">
            <small>Format Ejemplo: 20230512</small><br><br>





            <label for="fnotifica">Fecha Notifica:</label><br><br>
            <input type="text" value="{{ old('fnotifica') }}" maxlength="08"id="fnotifica" name="fnotifica"
                placeholder="AAAAMMDD" pattern="[0-9]{8}">
            <small>Format Ejemplo: 20230512</small><br><br>




            <label for="freq">Fecha Requerimiento:</label><br><br>
            <input type="text" value="{{ old('freq') }}" maxlength="08"id="freq" name="freq"
                placeholder="AAAAMMDD" pattern="[0-9]{8}">
            <small>Format Ejemplo: 20230512</small><br><br>




            <div class="form_row">
                <label>cvereq</label>
                <input class="form-control" maxlength="60" type="text" value="{{ old('cvereq') }}" name="cvereq">
            </div> <br>


            <label for="fembargo">Fecha Embargo:</label><br><br>
            <input type="text" value="{{ old('fembargo') }}" maxlength="08"id="fembargo" name="fembargo"
                placeholder="AAAAMMDD" pattern="[0-9]{8}">
            <small>Format Ejemplo: 20230512</small><br><br>

            <hr style="border-color: black; border-width: 2px; ">

            <div class="form_row">
                <label>status</label>
                <input class="form-control" maxlength="60" type="text" value="{{ old('status') }}" name="status">
            </div> <br>

            <div class="form_row">
                <label>usuario_mov</label>
                <input class="form-control" maxlength="60" type="text" value="{{ old('usuario_mov') }}"
                    name="usuario_mov" requiered>
            </div> <br>


            <form action="/action_page.php">
                <label for="fcaptura">Fecha Captura:</label><br><br>
                <input type="text" value="{{ old('fcaptura') }}" maxlength="08"id="fcaptura" name="fcaptura"
                    placeholder="AAAAMMDD" pattern="[0-9]{8}">
                <small>Format Ejemplo: 20230512</small><br><br>

            </form>


            <div class="form_row">
                <label>horacap</label>
                <input class="form-control" maxlength="60" type="text" value="{{ old('horacap') }}" name="horacap"
                    requiered>
            </div> <br>
            <div class="form_row">
                <label>capturista</label>
                <input class="form-control" maxlength="60" type="text" value="{{ old('capturista') }}"
                    name="capturista">
            </div> <br>


            <div class="form_row">
                <button name="BCrea" type="submit" class="btn btn-primary btn-lg"
                    onclick="document.forms.Crea.submit();">Crea Anuncio</button>
                {{-- //! aqui lo resolvi en esta pagina --}}
                {{-- https://es.stackoverflow.com/questions/418419/el-bot%C3%B3n-submit-no-funciona-en-formulario --}}
                {{--  --}}

            </div> <br>



    </form>
    <script>
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
