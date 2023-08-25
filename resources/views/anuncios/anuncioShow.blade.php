@extends('layouts.master')
@section('content')
    {{-- //! Clase 31 --}}
    <h6>Muestra Anuncio</h6>


    <h4>Dua {{ $ditems->dua }}</h4>
    <h4>Dom. Dua {{ $ditems->nomdua }}</h4>
    <h5>Sub Dua {{ $sitems->subdua }}</h5>
    <h5>Dom. SubDua {{ $sitems->sububicaion }}</h5>



    <div class="div-container">
        <div class="form_row">
            <label>cuenta</label>
            <input class="form-control" maxlength="60" type="text" name="cuenta" readonly
                value={{ str_pad($items->cuenta, 6, '0', STR_PAD_LEFT) }}>

            {{-- //! Clase  40 old --}}
            <label>dua</label>
            <input class="form-control" maxlength="60" type="text" name="dua" readonly
                value={{ old('dua') ?? $items->dua }} requiered>


            <label>subdua</label>
            <input class="form-control" maxlength="60" type="text" name="subdua" readonly
                value={{ old('subdua') ?? $items->subdua }} requiered>

        </div> <br>

        <div class="form_row">
            <label>concepto</label>
            <input class="form-control" maxlength="60" type="text" name="concepto" readonly
                value={{ old('concepto') ?? str_pad($items->concepto, 6, '0', STR_PAD_LEFT) }} requiered>

        </div> <br>

        <div class="form_row">
            <label>numper</label>
            <input class="form-control" maxlength="60" type="text" name="numper" readonly
                value={{ old('numper') ?? $items->numper }}>




            <label for="fperm">Fecha Permiso:</label>
            <input type="text" maxlength="08"id="fperm" name="fperm" placeholder="AAAAMMDD" pattern="[0-9]{8}"
                readonly value={{ old('fperm') ?? $items->fperm }}> <br><br>


        </div> <br>


        <div class="form_row">
            <label>Numero de Anuncios Temporales</label>
            <input class="form-control" maxlength="60" type="hidden" name="num_anun_temp" id="num_anun_temp" readonly
                value={{ old('num_anun_temp') ?? $items->num_anun_temp }}><br><br>

            <label>dias</label>
            <input class="form-control" maxlength="60" type="hidden" name="dias" id="dias" readonly
                value={{ old('dias') ?? $items->dias }}>
        </div> <br>

        <label for="finicio">Fecha Inicio:</label><br><br>
        <input type="text" maxlength="08"id="finicio" name="finicio" placeholder="AAAAMMDD" pattern="[0-9]{8}" readonly
            value={{ old('finicio') ?? $items->finicio }}><br><br>

    </div> <br>
    </div>
    <div class="div-container">

        <div class="form_row">

            <label for="ftermino">Fecha Termino:</label><br><br>
            <input type="hidden" maxlength="08"id="ftermino" name="ftermino" placeholder="AAAAMMDD" pattern="[0-9]{8}"
                readonly value={{ old('ftermino') ?? $items->ftermino }}> <br><br>


        </div> <br>

        <div class="form_row">
            <label>tipoanuncio</label>
            <input class="form-control" maxlength="60" readonly type="text" name="tipoanuncio" id="tipoanuncio" readonly
                value={{ old('tipoanuncio') ?? $items->tipoanuncio }} requiered>
        </div> <br>

        <div class="form_row">
            <label>Tipo Anuncio</label><br><br>
            <input type="radio" id="html" name="rtipoanuncio" id="RPR" readonly value="PR"
                {{ $items->tipoanuncio == ' PR' ? 'checked' : '' }} onchange="cambiaTipos()"> {{-- //! Clase  33 --}}
            <label for="html">Propio</label><br><br>
            <input type="radio" id="css" name="rtipoanuncio" id="RAJ" readonly value="AJ"
                {{ $items->tipoanuncio == 'AJ' ? 'checked' : '' }} onchange="cambiaTipos()"> {{-- //! Clase  33 --}}
            <label for="css">Ajeno</label><br><br>
            <input type="radio" id="html" name="rtipoanuncio" id="RTE" readonly value="TE"
                {{ $items->tipoanuncio == 'TE' ? 'checked' : '' }} onchange="cambiaTipos()"> {{-- //! Clase  33 --}}
            <label for="html">Temporal</label><br><br>
            <input type="radio" id="css" name="rtipoanuncio" id="REL" readonly value="EL"
                {{ $items->tipoanuncio == 'EL' ? 'checked' : '' }} onchange="cambiaTipos()"> {{-- //! Clase  33 --}}
            <label for="css">Electronico</label><br><br>


        </div> <br>
        <label>Adosado No Adosado</label><br><br>
        <label for="html">ADOSADO</label>
        <input type="radio" id="ADOSA" name="ANA" readonly value="A" onchange="cambiaTipos()">
        {{-- //! Clase  33 --}}
        <label for="html">NO ADOSADO</label>
        <input type="radio" id="NADOSA" name="ANA" readonly value="N" onchange="cambiaTipos()">
        {{-- //! Clase  33 --}}

        {{-- <br><br>   //! aqui voy   --}}


        <div class="form_row">
            <label>vistas</label><br>
            <input class="form-control" maxlength="10" type="text" name="vistas" id="vistas" readonly
                value={{ old('vistas') ?? $items->vistas }} requiered><br><br>


            <label>largo</label><br>
            <input class="form-control" type="text" maxlength="10" name="largo" id="largo"
                onchange="cambiaMedidas()" readonly value={{ old('largo') ?? $items->largo }} requiered /><br>


            <label>ancho</label><br>
            <input class="form-control" type="text" maxlength="10" name="ancho" id="ancho"
                onchange="cambiaMedidas()" readonly value={{ old('ancho') ?? $items->ancho }} requiered /><br><br>


            <label>area</label><br>
            <input class="form-control" type="text" readonly maxlength="10" name="area" id="area" readonly
                value={{ old('area') ?? $items->area }} requiered />
        </div> <br><br>

        <div class="form_row">
            <label>leyendaanuncio</label>
            <input class="form-control" maxlength="60" type="text" name="leyendaanuncio" readonly
                value={{ old('leyendaanuncio') ?? $items->leyendaanuncio }} requiered>
        </div> <br>

        <div class="form_row">

            {{-- <div class="row"> --}}
            <div class="col-md-4">
                <label>recof</label>
                <input class="form-control" maxlength="60" type="text" name="recof" readonly
                    value={{ old('recof') ?? $items->recof }} requiered>
            </div> <br>



            <div class="col-md-4">

                <label for="fpago">Fecha Pago:</label><br><br>
                <input type="text" maxlength="08"id="fpago" name="fpago" placeholder="AAAAMMDD"
                    pattern="[0-9]{8}" readonly value={{ old('fpago') ?? $items->fpago }}>


            </div> <br>


            <div class="col-md-4">


                <label for="fpagocap">Fecha Captura de Pago:</label><br><br>
                <input type="text" maxlength="08"id="fpagocap" name="fpagocap" placeholder="AAAAMMDD"
                    pattern="[0-9]{8}" readonly value={{ old('fpagocap') ?? $items->fpagocap }}>
                <br><br>


            </div> <br>

            <div class="row">

                <label>recofcap</label>
                <input class="form-control" maxlength="60" type="text" name="recofcap" readonly
                    value={{ old('recofcap') ?? $items->recofcap }}>


                <label>nombrecap</label>
                <input class="form-control" maxlength="60" type="text" name="nombrecap" readonly
                    value={{ old('nombrecap') ?? $items->nombrecap }}>


                <label>yearpagocap</label>
                <input class="form-control" maxlength="60" type="text" name="yearpagocap" readonly
                    value={{ old('yearpagocap') ?? $items->yearpagocap }}>

            </div> <br>

            <label for="fbajax">Fecha Baja:</label><br><br>
            <input type="text" maxlength="08"id="fbajax" name="fbajax" placeholder="AAAAMMDD"
                pattern="[0-9]{8}" readonly value={{ old('fbajax') ?? $items->fbajax }}>
            <br><br>

            <label for="fnotifica">Fecha Notifica:</label><br><br>
            <input type="text" maxlength="08"id="fnotifica" name="fnotifica" placeholder="AAAAMMDD"
                pattern="[0-9]{8}" readonly value={{ old('fnotifica') ?? $items->fnotifica }}>
            <br><br>


            <label for="freq">Fecha Requerimiento:</label><br><br>
            <input type="text" maxlength="08"id="freq" name="freq" placeholder="AAAAMMDD"
                pattern="[0-9]{8}" readonly value={{ old('freq') ?? $items->freq }}>
            <br><br>

            <div class="form_row">
                <label>cvereq</label>
                <input class="form-control" maxlength="60" type="text" name="cvereq" readonly
                    value={{ old('cvereq') ?? $items->cvereq }}>
            </div> <br>


            <label for="fembargo">Fecha Embargo:</label><br><br>
            <input type="text" maxlength="08"id="fembargo" name="fembargo" placeholder="AAAAMMDD"
                pattern="[0-9]{8}" readonly value={{ old('fembargo') ?? $items->fembargo }}>
            <br><br>

            <div class="form_row">
                <label>status</label>
                <input class="form-control" maxlength="60" type="text" name="status" readonly
                    value={{ old('status') ?? $items->status }}>
            </div> <br>

            <div class="form_row">
                <label>usuario_mov</label>
                <input class="form-control" maxlength="60" type="text" name="usuario_mov" readonly
                    value={{ old('usuario_mov') ?? $items->usuario_mov }} requiered>
            </div> <br>


            <form action="/action_page.php">
                <label for="fcaptura">Fecha Captura:</label><br><br>
                <input type="text" maxlength="08"id="fcaptura" name="fcaptura" placeholder="AAAAMMDD"
                    pattern="[0-9]{8}" readonly value={{ old('fcaptura') ?? $items->fcaptura }}>

            </form>


            <div class="form_row">
                <label>horacap</label>
                <input class="form-control" maxlength="60" type="text" name="horacap" readonly
                    value={{ old('horacap') ?? $items->horacap }} requiered>
            </div> <br>
            <div class="form_row">
                <label>capturista</label>
                <input class="form-control" maxlength="60" type="text" name="capturista" readonly
                    value={{ old('capturista') ?? $items->capturista }}>
            </div> <br>

            <div class="form_row">
                <td> <a href="{{ route('anuncios.lanuncios', ['subdua' => str_pad($sitems->subdua, 6, '0', STR_PAD_LEFT)]) }}"
                        class="btn btn-link">Lista Anuncios </td>
            </div> <br>
        </div>
    @endsection
