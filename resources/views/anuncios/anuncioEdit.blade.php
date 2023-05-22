@extends('layouts.master')
@section('content')
    {{-- //! Clase 31 --}}
    <h1>Edita Anuncios</h1>
    {{--    'cuenta',
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
                'capturista', --}}

    <h1>Dua {{ $ditems->dua }}</h1>
    <h1>Dom. Dua {{ $ditems->nomdua }}</h1>
    <h2>Sub Dua {{ $items->subdua }}</h2>
    <h2>Dom. SubDua {{ $items->sububicaion }}</h2>


    <form method="POST" action="{{ route('subduas.update', ['subdua' => $items->subdua]) }}"> {{--  //! Clase  31 tenia action en lugar de method --}}
        @csrf
        @method('PUT') {{-- //! Clase  33 --}}

        <div class="form_row">
            <label>cuenta</label>
            <input class="form-control" maxlength="60" type="text" name="cuenta" value={{ $items->cuenta }} requiered>


            <label>dua</label>
            <input class="form-control" maxlength="60" type="text" name="dua" value={{ $items->dua }} requiered>


            <label>subdua</label>
            <input class="form-control" maxlength="60" type="text" name="subdua" value={{ $items->subdua }} requiered>

        </div> <br>

        <div class="form_row">
            <label>concepto</label>
            <input class="form-control" maxlength="60" type="text" name="concepto" value={{ $items->concepto }}
                requiered>
        </div> <br>

        <div class="form_row">
            <label>numper</label>
            <input class="form-control" maxlength="60" type="text" name="numper" value={{ $items->numper }} requiered>



            <form action="/action_page.php">
                <label for="fperm">Fecha Permiso:</label><br><br>
                <input type="text" maxlength="08"id="fperm" name="fperm" placeholder="AAAAMMDD" pattern="[0-9]{8}"
                    value={{ $items->fperm }}><br><br>
                <small>Format Ejemplo: 20230512</small><br><br>

            </form>
        </div> <br>


        <div class="form_row">
            <form action="/action_page.php">
                <label for="finicio">Fecha Inicio:</label><br><br>
                <input type="text" maxlength="08"id="finicio" name="finicio" placeholder="AAAAMMDD" pattern="[0-9]{8}"
                    value={{ $items->finicio }}><br><br>
                <small>Format Ejemplo: 20230512</small><br><br>

            </form>

            <form action="/action_page.php">
                <label for="ftermino">Fecha Termino:</label><br><br>
                <input type="text" maxlength="08"id="ftermino" name="ftermino" placeholder="AAAAMMDD" pattern="[0-9]{8}"
                    value={{ $items->ftermino }}><br><br>
                <small>Format Ejemplo: 20230512</small><br><br>

            </form>
        </div> <br>

        <div class="form_row">
            <label>tipoanuncio</label>
            <input class="form-control" maxlength="60" type="text" name="tipoanuncio" value={{ $items->tipoanuncio }}
                requiered>
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
            <input class="form-control" maxlength="60" type="text" name="vistas" value={{ $items->vistas }} requiered>


            <label>largo</label>
            <input class="form-control" maxlength="60" type="text" name="largo" value={{ $items->largo }} requiered>


            <label>ancho</label>
            <input class="form-control" maxlength="60" type="text" name="ancho" value={{ $items->ancho }} requiered>


            <label>area</label>
            <input class="form-control" maxlength="60" type="text" name="area" value={{ $items->area }} requiered>
        </div> <br>

        <div class="form_row">
            <label>leyendaanuncio</label>
            <input class="form-control" maxlength="60" type="text" name="leyendaanuncio"
                value={{ $items->leyendaanuncio }} requiered>
        </div> <br>

        <div class="form_row">
            <label>num_anun_temp</label>
            <input class="form-control" maxlength="60" type="text" name="num_anun_temp"
                value={{ $items->num_anun_temp }} requiered>

            <label>dias</label>
            <input class="form-control" maxlength="60" type="text" name="dias" value={{ $items->dias }}
                requiered>
        </div> <br>


        <div class="row">
            <div class="col-md-4">
                <label>recof</label>
                <input class="form-control" maxlength="60" type="text" name="recof" value={{ $items->recof }}
                    requiered>
            </div> <br>



            <div class="col-md-4">
                <form action="/action_page.php">
                    <label for="fpago">Fecha Pago:</label><br><br>
                    <input type="text" maxlength="08"id="fpago" name="fpago" placeholder="AAAAMMDD"
                        pattern="[0-9]{8}" value={{ $items->fpago }}><br><br>
                    <small>Format Ejemplo: 20230512</small><br><br>

                </form>
            </div> <br>


            <div class="col-md-4">

                <form action="/action_page.php">
                    <label for="fpagocap">Fecha Captura de Pago:</label><br><br>
                    <input type="text" maxlength="08"id="fpagocap" name="fpagocap" placeholder="AAAAMMDD"
                        pattern="[0-9]{8}" value={{ $items->fpagocap }}><br><br>
                    <small>Format Ejemplo: 20230512</small><br><br>

                </form>
            </div> <br>




            <div class="row">
                
                    <label>recofcap</label>
                    <input class="form-control" maxlength="60" type="text" name="recofcap"
                        value={{ $items->recofcap }} requiered>
               
                
                    <label>nombrecap</label>
                    <input class="form-control" maxlength="60" type="text" name="nombrecap"
                        value={{ $items->nombrecap }} requiered>
                
                
                    <label>yearpagocap</label>
                    <input class="form-control" maxlength="60" type="text" name="yearpagocap"
                        value={{ $items->yearpagocap }} requiered>
                
            </div> <br>
       
        </div> <br>

        <form action="/action_page.php">
            <label for="fbajax">Fecha Baja:</label><br><br>
            <input type="text" maxlength="08"id="fbajax" name="fbajax" placeholder="AAAAMMDD"
                pattern="[0-9]{8}" value={{ $items->fbajax }}><br><br>
            <small>Format Ejemplo: 20230512</small><br><br>

        </form>


        <form action="/action_page.php">
            <label for="fnotifica">Fecha Notifica:</label><br><br>
            <input type="text" maxlength="08"id="fnotifica" name="fnotifica" placeholder="AAAAMMDD"
                pattern="[0-9]{8}" value={{ $items->fnotifica }}><br><br>
            <small>Format Ejemplo: 20230512</small><br><br>

        </form>

        <form action="/action_page.php">
            <label for="freq">Fecha Requerimiento:</label><br><br>
            <input type="text" maxlength="08"id="freq" name="freq" placeholder="AAAAMMDD"
                pattern="[0-9]{8}" value={{ $items->freq }}><br><br>
            <small>Format Ejemplo: 20230512</small><br><br>

        </form>


        <div class="form_row">
            <label>cvereq</label>
            <input class="form-control" maxlength="60" type="text" name="cvereq" value={{ $items->cvereq }}
                requiered>
        </div> <br>

        <form action="/action_page.php">
            <label for="fembargo">Fecha Embargo:</label><br><br>
            <input type="text" maxlength="08"id="fembargo" name="fembargo" placeholder="AAAAMMDD"
                pattern="[0-9]{8}" value={{ $items->fembargo }}><br><br>
            <small>Format Ejemplo: 20230512</small><br><br>

        </form>


        <div class="form_row">
            <label>status</label>
            <input class="form-control" maxlength="60" type="text" name="status" value={{ $items->status }}
                requiered>
        </div> <br>

        <div class="form_row">
            <label>usuario_mov</label>
            <input class="form-control" maxlength="60" type="text" name="usuario_mov"
                value={{ $items->usuario_mov }} requiered>
        </div> <br>


        <form action="/action_page.php">
            <label for="fcaptura">Fecha Captura:</label><br><br>
            <input type="text" maxlength="08"id="fcaptura" name="fcaptura" placeholder="AAAAMMDD"
                pattern="[0-9]{8}" value={{ $items->fcaptura }}><br><br>
            <small>Format Ejemplo: 20230512</small><br><br>

        </form>


        <div class="form_row">
            <label>horacap</label>
            <input class="form-control" maxlength="60" type="text" name="horacap" value={{ $items->horacap }}
                requiered>
        </div> <br>
        <div class="form_row">
            <label>capturista</label>
            <input class="form-control" maxlength="60" type="text" name="capturista" value={{ $items->capturista }}
                requiered>
        </div> <br>






        ///////////////////////////////////////////////////////////////////////////////////////////////




        <div class="form_row">
            <button type="submit" class="btn btn-primary btn-lg">Edita DUA</button>

        </div> <br>



    </form>
    <script>
        function updateCvecol(value) {
            document.getElementsByName("colonia")[0].value = value;
        }
    </script>
@endsection
