@extends('layouts.master')
@section('content')
    {{-- //! Clase 31 --}}
    <h6 style="margin-left: 2%;"> Crea DUA</h6>
    <form method="POST" action="{{ route('duas.store') }}">{{--  //! Clase  31 tenia action en lugar de method --}}
        @csrf
        {{-- <div tabindex="0" class="form_row highlight-on-hover_g"> --}}
        <div class="head_uno">

            <label>Dua</label>
            <input id="idua" class="form-control  highlight-on-hover_t" minlength="6" maxlength="6" type="text"
                name="dua" required>
            <br>


            <label>NomDua</label>
            <input class="form-control highlight-on-hover_t" maxlength="60" type="text" name="nomdua" required>
            <br>

            <label>DomDua</label>
            <input class="form-control highlight-on-hover_t" maxlength="40" type="text" name="domdua" required>
            <br>

        </div> <br>

        <div class="div-container">
            <div tabindex="0" class="form_row highlight-on-hover_g">
                {{-- <select id="ddlCol" class="ddl" onchange="this.form.submit()"> --}}
                <select id="ddlCol" class="highlight-on-hover_t" onchange="updateCvecol(this.value)">

                    <option value="" selected>Selecciona Colonia</option>
                    @foreach ($icolonias as $colonia)
                        <option value="{{ $colonia->colonia }}">{{ $colonia->nomcol }}</option>
                    @endforeach
                    Colonia
                </select>
            </div> <br>
            <div tabindex="0" class="form_row ">
                <input class="form-control highlight-on-hover_t" type="hidden" name="colonia" required>
                <br>
            </div> <br>

            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Ciudad</label>
                <input class="form-control highlight-on-hover_t" maxlength="40" type="text" name="ciudad" required>
                <br>
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Propietario</label>
                <input class="form-control highlight-on-hover_t" maxlength="40" type="text" name="prop" required>
                <br>
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Tel. Propietario</label>
                <input class="form-control highlight-on-hover_t" maxlength="20" type="text" name="telprop" required>
                <br>
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Rep. Legal</label>
                <input class="form-control highlight-on-hover_t" maxlength="40" type="text" name="rep_legal" required>
                <br>
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>RFC Dua</label>
                <input class="form-control highlight-on-hover_t" maxlength="20" type="text" name="rfc_dua" required>
                <br>
            </div> <br>
            <br>
            <fieldset class="form-group">
                <div tabindex="0" class="form_row highlight-on-hover_g">
                    <label>Seguro</label>


                    <input type="radio" id="html" name="seguro" value="SI">
                    <label for="html">SI</label><br>
                    <input type="radio" id="css" name="seguro" value="NO">
                    <label for="css">NO</label><br><br>

                </div> <br>
            </fieldset>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <form action="/action_page.php">
                    <label for="fechaini">Fecha Inicial:</label><br><br>
                    <input class=" highlight-on-hover_t" type="text" maxlength="08" id="fechaini" name="fechaini"
                        placeholder="AAAAMMDD" pattern="[0-9]{8}"><br><br>
                    <small>Format Ejemplo: 20230512</small><br><br>

                </form>
            </div> <br>

            <div tabindex="0" class="form_row highlight-on-hover_g">
                <form action="/action_page.php">
                    <label for="fechabaja">Fecha Baja:</label><br><br>
                    <input class=" highlight-on-hover_t" type="text" maxlength="08"id="fechabaja" name="fechabaja"
                        placeholder="AAAAMMDD" pattern="[0-9]{8}"><br><br>
                    <small>Format Ejemplo: 20230512</small><br><br>

                </form>
            </div> <br>

            <div tabindex="0" class="form_row highlight-on-hover_g">
                <button type="submit" class="btn btn-primary btn-lg">Inserta DUA</button>

            </div> <br>

        </div>

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
