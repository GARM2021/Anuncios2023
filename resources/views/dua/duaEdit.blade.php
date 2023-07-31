@extends('layouts.master')
@section('content')
    {{-- //! Clase 31 --}}

    <h4>     Edita DUA OK</h4>
    <form method="POST" action="{{ route('duas.update', ['dua' => $items->dua]) }}"> {{--  //! Clase  31 tenia action en lugar de method --}}
        @csrf
        @method('PUT') {{-- //! Clase  33 --}}


        <div class="head_uno">

            <div tabindex="0" class="form_row ">
                <label>Dua</label>
                <input id="idua" class="form-control  highlight-on-hover_t" minlength="6" maxlength="6" type="text" name="dua" 
                    value="{{ $items->dua }}">

            </div>
            <div tabindex="0" class="form_row ">
                <label>NomDuax</label>
                <input class="form-control highlight-on-hover_t" maxlength="60" type="text" name="nomdua" value="{{ $items->nomdua }}"
                    requiered>
            </div>
            <div tabindex="0" class="form_row ">
                <label>DomDua</label>
                <input class="form-control highlight-on-hover_t" maxlength="40" type="text" name="domdua" value="{{ $items->domdua }}"
                    requiered>

            </div> <br>
        </div>

        <div class="div-container ">

            <div tabindex="0" class="form_row highlight-on-hover_g ">
                <label>Colonia</label>
                <input class="form-control highlight-on-hover_t" maxlength="40" readonly type="text" name="nomcol" value="{{ $nomcol }}"
                    requiered>
                <br>
            </div> <br>

            <div tabindex="0" class="form_row highlight-on-hover_g">
                {{-- <select id="ddlCol" class="ddl" onchange="this.form.submit()"> --}}
                <select id="ddlCol" onchange="updateCvecol(this.value)" class="highlight-on-hover_t">

                    <option value="" selected>Selecciona Colonia</option>
                    @foreach ($icolonias as $colonia)
                        <option value="{{ $colonia->colonia }}">{{ $colonia->nomcol }}</option>
                    @endforeach
                    Colonia
                </select>
            </div> <br>
            {{-- <div  class="form_row highlight-on-hover_g"> --}}

            {{-- </div> <br> --}}

            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Ciudad</label>
                <input class="form-control highlight-on-hover_t" maxlength="40" type="text" name="ciudad" value="{{ $items->ciudad }}"
                    requiered>
                <br>
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Propietario</label>
                <input class="form-control highlight-on-hover_t" maxlength="40" type="text" name="prop" value="{{ $items->prop }}"
                    requiered>
                <br>
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Tel. Propietario</label>
                <input class="form-control highlight-on-hover_t" maxlength="20" type="text" name="telprop" value="{{ $items->telprop }}"
                    requiered>
                <br>
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Rep. Legal</label>
                <input class="form-control highlight-on-hover_t" maxlength="40" type="text" name="rep_legal" value="{{ $items->rep_legal }}"
                    requiered>
                <br>
            </div> <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>RFC Dua</label>
                <input class="form-control highlight-on-hover_t" maxlength="20" type="text" name="rfc_dua" value="{{ $items->rfc_dua }}"
                    requiered>
                <br>
            </div> <br>
            <br>
            <div tabindex="0" class="form_row highlight-on-hover_g">
                <label>Seguro</label>


                <input type="radio" id="html" name="seguro" value="SI"
                    {{ $items->seguro == 'SI' ? 'checked' : '' }}> {{-- //! Clase  33 --}}
                <label for="html">SI</label><br>
                <input type="radio" id="css" name="seguro" value="NO"
                    {{ $items->seguro == 'NO' ? 'checked' : '' }}> {{-- //! Clase  33 --}}
                <label for="css">NO</label><br><br>

            </div> <br>

            <div tabindex="0" class="form_row highlight-on-hover_g">
                <form action="/action_page.php">
                    <label for="fechaini">Fecha Inicial:</label><br><br>
                    <input type="text" maxlength="08" id="fechaini" name="fechaini" placeholder="AAAAMMDD"
                        pattern="[0-9]{8}" value="{{ $items->fechaini }}"><br><br>
                    <small>Format Ejemplo: 20230512</small><br><br>

                </form>
            </div> <br>

            <div tabindex="0" class="form_row highlight-on-hover_g">
                <form action="/action_page.php">
                    <label for="fechabaja">Fecha Baja:</label><br><br>
                    <input type="text" maxlength="08"id="fechabaja" name="fechabaja" placeholder="AAAAMMDD"
                        pattern="[0-9]{8}" value="{{ $items->fechabaja }}"><br><br>
                    <small>Format Ejemplo: 20230512</small><br><br>

                </form>
            </div> <br>


            <div tabindex="0">
                <button type="submit" class="btn btn-primary btn-lg">Edita DUA</button>

            </div> <br>

        </div>
        <input class="form-control highlight-on-hover_t" type="hidden" name="colonia" value="{{ $items->colonia }}" requiered>



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
