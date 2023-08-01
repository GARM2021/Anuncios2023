@extends('layouts.master')
@section('content')
    {{-- //! Clase 31 --}}
    <h4>Crea SUBDUA</h4>

    {{-- @dump($errors)
    @dump($dua) --}}
    <div class="head_uno">
        <h2>Dua {{ $dua }}</h2>
        <h2> {{ $nomdua }}</h2>
    </div> <br>






    {{-- <form method="POST" action="{{ route('subduas.store', ['dua' => $dua]) }}">  //! Clase  31 tenia action en lugar de method --}}
    <form method="POST" action="{{ route('subduas.store') }}"> {{--  //! Clase  31 tenia action en lugar de method --}}
        @csrf
        @method('PUT') {{-- //! Clase  33 --}}

        <input class="form-control highlight-on-hover_t" maxlength="60" type="hidden" readonly name="dua"
            value={{ $dua }}>

        <div class="head_uno">
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Nom SubDua</label>
                <input class="form-control highlight-on-hover_t" maxlength="60" type="text" name="nomsubdua"
                    value="{{ old('nomsubdua') }}" requiered>
                <br>
            </div> <br>

            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Dom SubDua</label>
                <input class="form-control highlight-on-hover_t" maxlength="40" type="text" name="sububicaion"
                    value="{{ old('sububicaion') }}" requiered>
                <br>
            </div> <br>
        </div> <br>

        <div class="div-container">

            {{-- <select id="ddlCol" class="ddl" onchange="this.form.submit()"> --}}
            <select id="ddlCol" onchange="updateCvecol(this.value)">

                <option value="" selected>Selecciona Colonia</option>
                @foreach ($icolonias as $colonia)
                    <option value="{{ $colonia->colonia }}">{{ $colonia->nomcol }}</option>
                @endforeach
                Colonia
            </select>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <input class="form-control highlight-on-hover_t" type="hidden" name="colonia" value="{{ old('colonia') }}"
                    requiered>
                <br>
            </div> <br>

            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Zona</label>
                <input class="form-control highlight-on-hover_t" maxlength="04" type="text" name="zona"
                    value="{{ old('zona') }}" requiered>
                <br>
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>subeexp</label>
                <input class="form-control highlight-on-hover_t" maxlength="08" type="text" name="subeexp"
                    value="{{ old('subeexp') }}" requiered>
                <br>
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Tel. Subdua</label>
                <input class="form-control highlight-on-hover_t" maxlength="20" type="text" name="subtelefono"
                    value="{{ old('subtelefono') }}" requiered>
                <br>
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Giro</label>
                <input class="form-control highlight-on-hover_t" maxlength="40" type="text" name="subdesgiro"
                    value="{{ old('subdesgiro') }}" requiered>
                <br>
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Uso de Suelo</label>
                <input class="form-control highlight-on-hover_t" maxlength="40" type="text" name=" subusossuelo"
                    value="{{ old('subusosuelo') }}" requiered>
                <br>
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>RFC SubDua</label>
                <input class="form-control highlight-on-hover_t" maxlength="20" type="text" name="subrfc"
                    value="{{ old('subrfc') }}" requiered>
                <br>
            </div> <br>
            <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Nombre Propietario</label>
                <input class="form-control highlight-on-hover_t" maxlength="40" type="text" name="propnom"
                    value="{{ old('propnom') }}" requiered>
                <br>
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Dom. Propietario</label>
                <input class="form-control highlight-on-hover_t" maxlength="40" type="text" name="propdir"
                    value="{{ old('propdir') }}" requiered>
                <br>
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Tel. Propietario</label>
                <input class="form-control highlight-on-hover_t" maxlength="20" type="text" name="proptel"
                    value="{{ old('proptel') }}" requiered>
                <br>
            </div> <br>

            {{-- <form action="/action_page.php" class="form_row highlight-on-hover_g">
                <div tabindex="0" class="form_row highlight-on-hover_g">
                    <label for="fechabaja">Fecha Baja:</label><br><br>
                    <input class="form-control highlight-on-hover_t" maxlength="08"id="fbajax" name="fbajax" placeholder="AAAAMMDD"
                        pattern="[0-9]{8}" value="{{ old('fbajax') }}"><br><br>
                    <small>Format Ejemplo: 20230512</small><br><br>
                    </div> <br>
                </form> --}}


            <div tabindex="0">
                <button type="submit" class="btn btn-primary btn-lg">Crea SUBDUA</button>

            </div> <br>

        </div> <br> 

    </form>
    <script>
        window.onload = function() {

            let cuenta = document.getElementById("idua").value;
            cuenta = cuenta.padStart(6, '0');
            document.getElementById("idua").value = cuenta;

            const divs = document.querySelectorAll('div');
            for (const div of divs) {
                div.addEventListener('focus', function() {
                    this.style.backgroundColor = 'rgb(123, 116, 133,1)';
                    this.style.color = 'white !important';
                });
                div.addEventListener('blur', function() {
                    this.style.backgroundColor = 'white';
                    this.style.color = 'black !important';

                });
            }

        }

        function updateCvecol(value) {
            document.getElementsByName("colonia")[0].value = value;
        }
    </script>
@endsection
