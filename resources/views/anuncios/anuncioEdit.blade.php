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
        </div> <br>
        <div class="form_row">
            <label>dua</label>
            <input class="form-control" maxlength="60" type="text" name="dua" value={{ $items->dua }} requiered>
        </div> <br>
        <div class="form_row">
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
        </div> <br>
    

        <form action="/action_page.php">
            <label for="fperm">Fecha Permiso:</label><br><br>
            <input type="text" maxlength="08"id="fperm" name="fperm" placeholder="AAAAMMDD" pattern="[0-9]{8}"
                value={{ $items->fperm }}><br><br>
            <small>Format Ejemplo: 20230512</small><br><br>

        </form>


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


        <div class="form_row">
            <label>tipoanuncio</label>
            <input class="form-control" maxlength="60" type="text" name="tipoanuncio" value={{ $items->tipoanuncio }}
                requiered>
        </div> <br>
        <div class="form_row">
            <label>vistas</label>
            <input class="form-control" maxlength="60" type="text" name="vistas" value={{ $items->vistas }} requiered>
        </div> <br>
        <div class="form_row">
            <label>largo</label>
            <input class="form-control" maxlength="60" type="text" name="largo" value={{ $items->largo }} requiered>
        </div> <br>
        <div class="form_row">
            <label>ancho</label>
            <input class="form-control" maxlength="60" type="text" name="ancho" value={{ $items->ancho }} requiered>
        </div> <br>
        <div class="form_row">
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
        </div> <br>
        <div class="form_row">
            <label>dias</label>
            <input class="form-control" maxlength="60" type="text" name="dias" value={{ $items->dias }} requiered>
        </div> <br>

       
        <form action="/action_page.php">
            <label for="fpago">Fecha Pago:</label><br><br>
            <input type="text" maxlength="08"id="fpago" name="fpago" placeholder="AAAAMMDD" pattern="[0-9]{8}"
                value={{ $items->fpago }}><br><br>
            <small>Format Ejemplo: 20230512</small><br><br>

        </form>


        <div class="form_row">
            <label>recof</label>
            <input class="form-control" maxlength="60" type="text" name="recof" value={{ $items->recof }}
                requiered>
        </div> <br>
      

        <form action="/action_page.php">
            <label for="fpagocap">Fecha Captura de Pago:</label><br><br>
            <input type="text" maxlength="08"id="fpagocap" name="fpagocap" placeholder="AAAAMMDD"
                pattern="[0-9]{8}" value={{ $items->fpagocap }}><br><br>
            <small>Format Ejemplo: 20230512</small><br><br>

        </form>


        <div class="form_row">
            <label>recofcap</label>
            <input class="form-control" maxlength="60" type="text" name="recofcap" value={{ $items->recofcap }}
                requiered>
        </div> <br>
        <div class="form_row">
            <label>nombrecap</label>
            <input class="form-control" maxlength="60" type="text" name="nombrecap" value={{ $items->nombrecap }}
                requiered>
        </div> <br>
        <div class="form_row">
            <label>yearpagocap</label>
            <input class="form-control" maxlength="60" type="text" name="yearpagocap"
                value={{ $items->yearpagocap }} requiered>
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

        {{-- <div class="form_row">
                <label>Nom SubDua</label>
                <input class="form-control" maxlength="60" type="text" name="nomsubdua"  value = {{$items->nomsubdua}}  requiered>
            </div> <br>
            <div class="form_row">
                <label>Dom SubDua</label>
                <input class="form-control" maxlength="40" type="text" name="sububicacion" value = {{$items->sububicaion}}  requiered>
                <br>
            </div> <br>
            <div class="form_row">
                <label>Colonia</label>
                <input class="form-control" maxlength="40" type="text" name="nomcol" value = {{$nomcol}}  requiered>
                <br>
            </div> <br>


            
            <select id="ddlCol" onchange="updateCvecol(this.value)">

                <option value="" selected>Selecciona Colonia</option>
                @foreach ($icolonias as $colonia)
                    <option value="{{ $colonia->colonia }}">{{ $colonia->nomcol }}</option>
                @endforeach
                Colonia
            </select>
            <div class="form_row">
                <input class="form-control" type="hidden" name="colonia" value = {{$items->colonia}}  requiered>
                <br>
            </div> <br>

            <div class="form_row">
                <label>Zona</label>
                <input class="form-control" maxlength="04" type="text" name="zona" value = {{$items->zona}}  requiered>
                <br>
            </div> <br>
            <div class="form_row">
                <label>subeexp</label>
                <input class="form-control" maxlength="08" type="text" name="subeexp" value = {{$items->subeexp}}  requiered>
                <br>
            </div> <br>
            <div class="form_row">
                <label>Tel. Subdua</label>
                <input class="form-control" maxlength="20" type="text" name="subtelefono" value = {{$items->subtelefono}}  requiered>
                <br>
            </div> <br>
            <div class="form_row">
                <label>Giro</label>
                <input class="form-control" maxlength="40" type="text" name="subdesgiro" value = {{$items->subdesgiro}}  requiered>
                <br>
            </div> <br>
            <div class="form_row">
                <label>Uso de Suelo</label>
                <input class="form-control" maxlength="40" type="text" name="subusossuelo" value = {{$items->subusossuelo}}  requiered>
                <br>
            </div> <br>
            <div class="form_row">
                <label>RFC SubDua</label>
                <input class="form-control" maxlength="20" type="text" name="subrfc" value = {{$items->subrfc}}  requiered>
                <br>
            </div> <br>
            <br>
            <div class="form_row">
                <label>Nombre Propietario</label>
                <input class="form-control" maxlength="40" type="text" name="propnom" value = {{$items->propnom}}  requiered>
                <br>
            </div> <br>
            <div class="form_row">
                <label>Dom. Propietario</label>
                <input class="form-control" maxlength="40" type="text" name="propdir" value = {{$items->propdir}}  requiered>
                <br>
            </div> <br>
            <div class="form_row">
                <label>Tel. Propietario</label>
                <input class="form-control" maxlength="20" type="text" name="proptel" value = {{$items->proptel}}  requiered>
                <br>
            </div> <br>
    
            <form action="/action_page.php">
                <label for="fechabaja">Fecha Baja:</label><br><br>
                <input type="text" maxlength="08"id="fbajax" name="fbajax" placeholder="AAAAMMDD" pattern="[0-9]{8}" value = {{$items->fbajax}} ><br><br>
                <small>Format Ejemplo: 20230512</small><br><br>

            </form> --}}


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
