@extends('layouts.app')
@section('content')
    {{-- //! Clase 31 --}}

    

    <h6 style="margin-left: 2%;">Genera Adeudos</h6>

    {{-- @dump($errors)
    @dump($dua) --}}
    <div class="head_uno">
        <h5>Dua {{ $dua }}</h5>
        <h5> {{ $nomdua }}</h5>
        <h6>SubDua {{ $subdua }}</h6>
        <h6>Dom. SubDua: {{ $sububicaion }}</h6>
    </div> <br>
    <div class="div-container">
        <form id="Genera" name="Genera" method="POST" action="{{ route('adeudos.genera') }}">
            {{-- //! aqui lo resolvi asi  --}}
            {{-- //! https://es.stackoverflow.com/questions/418419/el-bot%C3%B3n-submit-no-funciona-en-formulario  --}}
            {{-- //! tenia unos elementos form intermedios? y en la lina 299  --}}
            {{--  //! Clase  31 tenia action en lugar de method --}}
            @csrf


            <div tabindex="0">
                <input class="form-control highlight-on-hover_t" maxlength="60" type="hidden" name="dua"
                    value="{{ $dua }}" requiered>
            </div>


            <div tabindex="0">
                <input type="hidden" name="subdua" value="{{ $subdua }}" requiered>
            </div>
            <div tabindex="0">
                <input type="hidden" name="nomdua" value="{{ $nomdua }}" requiered>
            </div>


            <div tabindex="0">
                <input type="hidden" name="sububicacion" value="{{ $sububicaion }}" requiered>
            </div>


            <br>

            <div class="input-group mb-3 ">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Recibo del Ultimo pago </span>
                </div>
                <input class=" highlight-on-hover_t" maxlength="60" type="text" name="recibo" id="recibo"
                    placeholder="CCCCNNNNNN C=CAJA N=CONSECUTIVO">
            </div>

            <div class="input-group mb-3 ">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Fecha Ultimo Pago: </span>
                </div>
                <input class=" highlight-on-hover_t" type="text" maxlength="08" id="fupago" name="fupago"
                    placeholder="AAAAMMDD" pattern="[0-9]{8}">
                <small> Format Ejemplo: 20230512</small>
            </div>



            <hr style="border-color: black; border-width: 2px;">

            <br>



            <div class="input-group mb-3 ">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Año Pagado </span>
                </div>
                <select name="AñoPagado" id="AñoPagado" class="highlight-on-hover_t" requiered>
                    <?php
                    for ($year = 1999; $year <= 2024; $year++) {
                        echo "<option value='$year'>$year</option>";
                    }
                    ?>
                </select>
            </div>


            <br>


            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Año Generado </span>
                </div>
                <select name="AñoGenerado" id="AñoGenerado" class=" highlight-on-hover_t" requiered>
                    <?php
                    for ($yearf = 1999; $yearf <= 2024; $yearf++) {
                        echo "<option value='$yearf'>$yearf</option>";
                    }
                    ?>
                </select>
            </div>



            <br>

            <hr style="border-color: black; border-width: 2px;">

            <br>

            <div tabindex="0">
                <button name="BCrea" type="submit" class="btn btn-primary btn-sm"
                    onclick="document.forms.Genera.submit();">Genera Adeudos</button>
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
