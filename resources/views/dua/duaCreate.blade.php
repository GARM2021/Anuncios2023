@extends('layouts.master')
@section('content')
    {{-- //! Clase 31 --}}
    <h1>Crea DUA</h1>
    <form method="POST" action="{{ route('duas.store') }}">{{--  //! Clase  31 tenia action en lugar de method --}}
        @csrf
        <div class="form_row">
            <div class="form_row">
                <label>Dua</label>
                <input class="form-control" minlength="6" maxlength="6" type="text" name="dua" required>
                <br>
            </div> <br>
            <div class="form_row">
                <label>NomDua</label>
                <input class="form-control" maxlength="60" type="text" name="nomdua" required>
            </div> <br>
            <div class="form_row">
                <label>DomDua</label>
                <input class="form-control" maxlength="40" type="text" name="domdua" required>
                <br>
            </div> <br>
            {{-- <select id="ddlCol" class="ddl" onchange="this.form.submit()"> --}}
            <select id="ddlCol" onchange="updateNomcol(this.value)">

                <option value="" selected>Selecciona Colonia</option>
                @foreach ($icolonias as $colonia)
                    <option value="{{ $colonia->colonia }}">{{ $colonia->nomcol }}</option>
                @endforeach
                Colonia
            </select>
            <div class="form_row">
                <input class="form-control" type="hidden" name="colonia" required>
                <br>
            </div> <br>

            <div class="form_row">
                <label>Ciudad</label>
                <input class="form-control" maxlength="40" type="text" name="ciudad" required>
                <br>
            </div> <br>
            <div class="form_row">
                <label>Propietario</label>
                <input class="form-control" maxlength="40" type="text" name="prop" required>
                <br>           
            </div> <br>
            <div class="form_row">
                <label>Tel. Propietario</label>
                <input class="form-control" maxlength="20" type="text" name="telprop" required>
                <br>
            </div> <br>
            <div class="form_row">
                <label>Rep. Legal</label>
                <input class="form-control" maxlength="40" type="text" name="rep_legal" required>
                <br>
            </div> <br>
            <div class="form_row">
                <label>RFC Dua</label>
                <input class="form-control" maxlength="20" type="text" name="rfc_dua" required>
                <br>
            </div> <br>
            <br>
            <div class="form_row">
                <label>Seguro</label>
                

                <input type="radio" id="html" name="seguro" value="SI">
                <label for="html">SI</label><br>
                <input type="radio" id="css" name="seguro" value="NO">
                <label for="css">NO</label><br><br>

            </div> <br>
         

            <form action="/action_page.php">
                <label for="fechaini">Fecha Inicial:</label><br><br>
                <input type="text" id="fechaini" name="fechaini" placeholder="AAAAMMDD"
                pattern="[0-9]{8}"><br><br>
                <small>Format Ejemplo: 20230512</small><br><br>
                
              </form> 

             
              <form action="/action_page.php">
                <label for="fechabaja">Fecha Baja:</label><br><br>
                <input type="text" id="fechabaja" name="fechabaja" placeholder="AAAAMMDD"
                pattern="[0-9]{8}"><br><br>
                <small>Format Ejemplo: 20230512</small><br><br>
                
              </form> 
           
           
            <div class="form_row">
                <button type="submit" class="btn btn-primary btn-lg">Inserta DUA</button>

            </div> <br>



    </form>
    <script>
        function updateNomcol(value) {
            document.getElementsByName("colonia")[0].value = value;
        }
    </script>
@endsection
