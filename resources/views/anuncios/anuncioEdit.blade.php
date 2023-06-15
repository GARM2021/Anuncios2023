@extends('layouts.master')
@section('content')
    {{-- //! Clase 31 --}}
    <h1>Edita Anuncio</h1>

    @dump($errors)
    <h1>Dua {{ $ditems->dua }}</h1>
    <h1>Dom. Dua {{ $ditems->nomdua }}</h1>
    <h2>Sub Dua {{ $items->subdua }}</h2>
    <h2>Dom. SubDua {{ $items->sububicaion }}</h2>


    <form id="Actualiza" name="Actualiza" method="POST"
        action="{{ route('anuncios.update', ['cuenta' => str_pad($items->cuenta, 6, '0', STR_PAD_LEFT)]) }}">
        {{-- //! aqui lo resolvi asi  --}}
        {{-- //! https://es.stackoverflow.com/questions/418419/el-bot%C3%B3n-submit-no-funciona-en-formulario  --}}
        {{-- //! tenia unos elementos form intermedios? y en la lina 299  --}}
        {{--  //! Clase  31 tenia action en lugar de method --}}
        @csrf
        @method('PUT')


        <div class="form_row">
            <label>cuenta</label>
            <input class="form-control" maxlength="60" type="text" name="cuenta"
                value={{ old('') ?? str_pad($items->cuenta, 6, '0', STR_PAD_LEFT) }} requiered>

            {{-- //! Clase  40 old --}}
            <label>dua</label>
            <input class="form-control" maxlength="60" type="text" name="dua" value={{ old('dua') ?? $items->dua }}
                requiered>


            <label>subdua</label>
            <input class="form-control" maxlength="60" type="text" name="subdua"
                value={{ old('subdua') ?? $items->subdua }} requiered>

        </div> <br>

        <div class="form_row">
            <label>concepto</label>
            <input class="form-control" maxlength="60" type="text" name="concepto"
            value={{ old('concepto') ?? str_pad($items->concepto, 6, '0', STR_PAD_LEFT) }} requiered>
              
        </div> <br>

        <div class="form_row">
            <label>numper</label>
            <input class="form-control" maxlength="60" type="text" name="numper"
                value={{ old('numper') ?? $items->numper }}>



            <div class="form_row">
                <label for="fperm">Fecha Permiso:</label><br><br>
                <input type="text" maxlength="08"id="fperm" name="fperm" placeholder="AAAAMMDD" pattern="[0-9]{8}"
                    value={{ old('fperm') ?? $items->fperm }}><br><br>
                <small>Format Ejemplo: 20230512</small><br><br>


            </div> <br>


            <div class="form_row">

                <label for="finicio">Fecha Inicio:</label><br><br>
                <input type="text" maxlength="08"id="finicio" name="finicio" placeholder="AAAAMMDD" pattern="[0-9]{8}"
                    value={{ old('finicio') ?? $items->finicio }}><br><br>
                <small>Format Ejemplo: 20230512</small><br><br>

                <label for="ftermino">Fecha Termino:</label><br><br>
                <input type="text" maxlength="08"id="ftermino" name="ftermino" placeholder="AAAAMMDD" pattern="[0-9]{8}"
                    value={{ old('ftermino') ?? $items->ftermino }}><br><br>
                <small>Format Ejemplo: 20230512</small><br><br>


            </div> <br>

            <div class="form_row">
                <label>tipoanuncio</label>
                <input class="form-control" maxlength="60" type="text" name="tipoanuncio"
                    value={{ old('tipoanuncio') ?? $items->tipoanuncio }} requiered>
            </div> <br>

            <div class="form_row">
                <label>Tipo Anuncio</label>


                <input type="radio" id="html" name="tipoanuncio" value="PR"
                    {{ $items->seguro == ' PR' ? 'checked' : '' }}> {{-- //! Clase  33 --}}
                <label for="html">Propio</label><br>
                <input type="radio" id="css" name="tipoanuncio" value="AJ"
                    {{ $items->seguro == 'AJ' ? 'checked' : '' }}> {{-- //! Clase  33 --}}
                <label for="css">Ajeno</label><br><br>
                <input type="radio" id="html" name="tipoanuncio" value="TE"
                    {{ $items->seguro == 'TE' ? 'checked' : '' }}> {{-- //! Clase  33 --}}
                <label for="html">Temporal</label><br>
                <input type="radio" id="css" name="tipoanuncio" value="EL"
                    {{ $items->seguro == 'EL' ? 'checked' : '' }}> {{-- //! Clase  33 --}}
                <label for="css">Electronico</label><br><br>


            </div> <br>

            <div class="form_row">
                <label>vistas</label>
                <input class="form-control" maxlength="10" type="text" name="vistas" id="vistas"  
                    value={{ old('vistas') ?? $items->vistas }} requiered>


                <label>largo</label>
                <input class="form-control" type="text"  maxlength="10"  name="largo" id="largo" onchange="cambiaMedidas()" 
                    value={{ old('largo') ?? $items->largo }} requiered/>


                <label>ancho</label>
                <input class="form-control" type="text"  maxlength="10"  name="ancho" id="ancho" onchange="cambiaMedidas()" 
              
                    value={{ old('ancho') ?? $items->ancho }} requiered/>


                <label>area</label>
                <input class="form-control" type="text" readonly maxlength="10"   name="area" id="area"  
                    value={{ old('area') ?? $items->area }} requiered/>
            </div> <br>

            <div class="form_row">
                <label>leyendaanuncio</label>
                <input class="form-control" maxlength="60" type="text" name="leyendaanuncio"
                    value={{ old('leyendaanuncio') ?? $items->leyendaanuncio }} requiered>
            </div> <br>

            <div class="form_row">
                <label>num_anun_temp</label>
                <input class="form-control" maxlength="60" type="text" name="num_anun_temp"
                    value={{ old('num_anun_temp') ?? $items->num_anun_temp }}>

                <label>dias</label>
                <input class="form-control" maxlength="60" type="text" name="dias"
                    value={{ old('dias') ?? $items->dias }}>
            </div> <br>


            {{-- <div class="row"> --}}
            <div class="col-md-4">
                <label>recof</label>
                <input class="form-control" maxlength="60" type="text" name="recof"
                    value={{ old('recof') ?? $items->recof }} requiered>
            </div> <br>



            <div class="col-md-4">
             
                    <label for="fpago">Fecha Pago:</label><br><br>
                    <input type="text" maxlength="08"id="fpago" name="fpago" placeholder="AAAAMMDD"
                        pattern="[0-9]{8}" value={{ old('fpago') ?? $items->fpago }}><br><br>
                    <small>Format Ejemplo: 20230512</small><br><br>

              
            </div> <br>


            <div class="col-md-4">

                
                    <label for="fpagocap">Fecha Captura de Pago:</label><br><br>
                    <input type="text" maxlength="08"id="fpagocap" name="fpagocap" placeholder="AAAAMMDD"
                        pattern="[0-9]{8}" value={{ old('fpagocap') ?? $items->fpagocap }}><br><br>
                    <small>Format Ejemplo: 20230512</small><br><br>

              
            </div> <br>




            <div class="row">

                <label>recofcap</label>
                <input class="form-control" maxlength="60" type="text" name="recofcap"
                    value={{ old('recofcap') ?? $items->recofcap }}>


                <label>nombrecap</label>
                <input class="form-control" maxlength="60" type="text" name="nombrecap"
                    value={{ old('nombrecap') ?? $items->nombrecap }}>


                <label>yearpagocap</label>
                <input class="form-control" maxlength="60" type="text" name="yearpagocap"
                    value={{ old('yearpagocap') ?? $items->yearpagocap }}>

            </div> <br>



         
                <label for="fbajax">Fecha Baja:</label><br><br>
                <input type="text" maxlength="08"id="fbajax" name="fbajax" placeholder="AAAAMMDD"
                    pattern="[0-9]{8}" value={{ old('fbajax') ?? $items->fbajax }}><br><br>
                <small>Format Ejemplo: 20230512</small><br><br>

          


          
                <label for="fnotifica">Fecha Notifica:</label><br><br>
                <input type="text" maxlength="08"id="fnotifica" name="fnotifica" placeholder="AAAAMMDD"
                    pattern="[0-9]{8}" value={{ old('fnotifica') ?? $items->fnotifica }}><br><br>
                <small>Format Ejemplo: 20230512</small><br><br>

          

           
                <label for="freq">Fecha Requerimiento:</label><br><br>
                <input type="text" maxlength="08"id="freq" name="freq" placeholder="AAAAMMDD"
                    pattern="[0-9]{8}" value={{ old('freq') ?? $items->freq }}><br><br>
                <small>Format Ejemplo: 20230512</small><br><br>

           


            <div class="form_row">
                <label>cvereq</label>
                <input class="form-control" maxlength="60" type="text" name="cvereq"
                    value={{ old('cvereq') ?? $items->cvereq }}>
            </div> <br>

           
                <label for="fembargo">Fecha Embargo:</label><br><br>
                <input type="text" maxlength="08"id="fembargo" name="fembargo" placeholder="AAAAMMDD"
                    pattern="[0-9]{8}" value={{ old('fembargo') ?? $items->fembargo }}><br><br>
                <small>Format Ejemplo: 20230512</small><br><br>

          

            <div class="form_row">
                <label>status</label>
                <input class="form-control" maxlength="60" type="text" name="status"
                    value={{ old('status') ?? $items->status }}>
            </div> <br>

            <div class="form_row">
                <label>usuario_mov</label>
                <input class="form-control" maxlength="60" type="text" name="usuario_mov"
                    value={{ old('usuario_mov') ?? $items->usuario_mov }} requiered>
            </div> <br>


            <form action="/action_page.php">
                <label for="fcaptura">Fecha Captura:</label><br><br>
                <input type="text" maxlength="08"id="fcaptura" name="fcaptura" placeholder="AAAAMMDD"
                    pattern="[0-9]{8}" value={{ old('fcaptura') ?? $items->fcaptura }}><br><br>
                <small>Format Ejemplo: 20230512</small><br><br>

            </form>


            <div class="form_row">
                <label>horacap</label>
                <input class="form-control" maxlength="60" type="text" name="horacap"
                    value={{ old('horacap') ?? $items->horacap }} requiered>
            </div> <br>
            <div class="form_row">
                <label>capturista</label>
                <input class="form-control" maxlength="60" type="text" name="capturista"
                    value={{ old('capturista') ?? $items->capturista }}>
            </div> <br>






            <div class="form_row">
                <button name="update" type="submit" class="btn btn-primary btn-lg"
                    onclick="document.forms.Actualiza.submit();">Actualiza Anuncio</button>
                {{-- //! aqui lo resolvi en esta pagina --}}
                {{-- https://es.stackoverflow.com/questions/418419/el-bot%C3%B3n-submit-no-funciona-en-formulario --}}
                {{--  --}}

            </div> <br>



    </form>
    <script>
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

                var gdarea = gdancho * gdlargo ;
                gdarea = gdarea.toFixed(2);

                var sarea = gdarea.toString();
                goarea.value = sarea;
                // gtbancho.classList.add("largocambiado");
                // goarea.classList.add("areacambiada");
            } catch (ex) {
                var sEx = ex.message.toString();
                document.write("Mensaje de Error: " + sEx);
            }
        }
    </script>
@endsection
