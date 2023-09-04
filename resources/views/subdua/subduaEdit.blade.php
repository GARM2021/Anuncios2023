@extends('layouts.app')
@section('content')
    {{-- //! Clase 31 --}}
    <h6 style="margin-left: 2%;">Edita SUBDUA</h6>
    {{-- 'subdua',
    'nomsubdua',
    'dua',
    'sububicaion',
    'zona',
    'colonia',
    'subeexp',
    'subtelefono',
    'subdesgiro',
    'subusossuelo',
    'subrfc',
    'propnom',
    'propdir',
    'proptel',
    'fbajax', --}}

    <div class="head_uno">

        <h5>Dua {{ $ditems->dua }}</h5>
        <h5>Dom. Dua {{ $ditems->nomdua }}</h5>
        <h6>Sub Dua {{ $items->subdua }}</h6>
        <h6>Dom. SubDua {{ $items->sububicaion }}</h6>

    </div>


    <form method="POST" action="{{ route('subduas.update', ['subdua' => $items->subdua]) }}"> {{--  //! Clase  31 tenia action en lugar de method --}}
        @csrf
        @method('PUT') {{-- //! Clase  33 --}}
        <div class="form_row">
            <div class="head_uno">

                <div tabindex="0" class="form_row ">
                    <label>Nom SubDua</label>
                    <input class="form-control highlight-on-hover_t" maxlength="60" type="text" name="nomsubdua"
                        value="{{ $items->nomsubdua }}" requiered>
                </div> <br>
                <div tabindex="0" class="form_row ">
                    <label>Dom SubDua</label>
                    <input class="form-control highlight-on-hover_t" maxlength="40" type="text" name="sububicacion"
                        value="{{ $items->sububicaion }}" requiered>
                    <br>
                </div> <br>
            </div> <br>

            <div class="div-container ">
                <div tabindex="0" class="form_row highlight-on-hover_g ">
                    <label>Colonia</label>
                    <input class="form-control highlight-on-hover_t"maxlength="40" type="text" name="nomcol"
                        value="{{ $nomcol }}" requiered>
                    <br>
                </div> <br>

                <div tabindex="0" class="form_row highlight-on-hover_g ">
                    {{-- <select id="ddlCol" class="ddl" onchange="this.form.submit()"> --}}
                    <select id="ddlCol" class="highlight-on-hover_t"  onchange="updateCvecol(this.value)">

                        <option value="" selected>Selecciona Colonia</option>
                        @foreach ($icolonias as $colonia)
                            <option value="{{ $colonia->colonia }}">{{ $colonia->nomcol }}</option>
                        @endforeach
                        Colonia
                    </select>
                </div> <br>
                <div tabindex="0" class="form_row highlight-on-hover_g ">
                    <input class="form-control highlight-on-hover_t" type="hidden" name="colonia"
                        value="{{ $items->colonia }}" requiered>
                    <br>
                </div> <br>

                <div tabindex="0" class="form_row highlight-on-hover_g ">
                    <label>Zona</label>
                    <input class="form-control highlight-on-hover_t"maxlength="04" type="text" name="zona"
                        value="{{ $items->zona }}" requiered>
                    <br>
                </div> <br>
                <div tabindex="0" class="form_row highlight-on-hover_g ">
                    <label>subeexp</label>
                    <input class="form-control highlight-on-hover_t"maxlength="08" type="text" name="subeexp"
                        value="{{ $items->subeexp }}" requiered>
                    <br>
                </div> <br>
                <div tabindex="0" class="form_row highlight-on-hover_g ">
                    <label>Tel. Subdua</label>
                    <input class="form-control highlight-on-hover_t"maxlength="20" type="text" name="subtelefono"
                        value="{{ $items->subtelefono }}" requiered>
                    <br>
                </div> <br>
                <div tabindex="0" class="form_row highlight-on-hover_g ">
                    <label>Giro</label>
                    <input class="form-control highlight-on-hover_t"maxlength="40" type="text" name="subdesgiro"
                        value="{{ $items->subdesgiro }}" requiered>
                    <br>
                </div> <br>
                <div tabindex="0" class="form_row highlight-on-hover_g ">
                    <label>Uso de Suelo</label>
                    <input class="form-control highlight-on-hover_t"maxlength="40" type="text" name="subusossuelo"
                        value="{{ $items->subusossuelo }}" requiered>
                    <br>
                </div> <br>
                <div tabindex="0" class="form_row highlight-on-hover_g ">
                    <label>RFC SubDua</label>
                    <input class="form-control highlight-on-hover_t"maxlength="20" type="text" name="subrfc"
                        value="{{ $items->subrfc }}" requiered>
                    <br>
                </div> <br>
                <br>
                <div tabindex="0" class="form_row highlight-on-hover_g ">
                    <label>Nombre Propietario</label>
                    <input class="form-control highlight-on-hover_t"maxlength="40" type="text" name="propnom"
                        value="{{ $items->propnom }}" requiered>
                    <br>
                </div> <br>
                <div tabindex="0" class="form_row highlight-on-hover_g ">
                    <label>Dom. Propietario</label>
                    <input class="form-control highlight-on-hover_t"maxlength="40" type="text" name="propdir"
                        value="{{ $items->propdir }}" requiered>
                    <br>
                </div> <br>
                <div tabindex="0" class="form_row highlight-on-hover_g ">
                    <label>Tel. Propietario</label>
                    <input class="form-control highlight-on-hover_t"maxlength="20" type="text" name="proptel"
                        value="{{ $items->proptel }}" requiered>
                    <br>
                </div> <br>
                <div tabindex="0" class="form_row highlight-on-hover_g ">
                    <form action="/action_page.php">
                        <label for="fechabaja">Fecha Baja:</label><br><br>
                        <input type="text" maxlength="08"id="fbajax" name="fbajax" placeholder="AAAAMMDD"
                            pattern="[0-9]{8}" value="{{ $items->fbajax }}"><br><br>
                        <small>Format Ejemplo: 20230512</small><br><br>

                    </form>
                </div> <br>


                <div tabindex="0" >
                    <button type="submit" class="btn btn-primary btn-sm">Actualiza SUBDUA</button>

                </div> <br>
            </div> <br>




    </form>
    <script>
        function updateCvecol(value) {
            document.getElementsByName("colonia")[0].value = value;
        }
    </script>
@endsection
