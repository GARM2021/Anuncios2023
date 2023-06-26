@extends('layouts.master')
@section('content')
    {{-- //! Clase 31 --}}
    <h1>Crea SUBDUA</h1>

    {{-- @dump($errors)
    @dump($dua) --}}
    <h1>Dua {{ $dua }}</h1>
    <h1>Dom. Dua {{ $nomdua }}</h1>
    


  



       // <form method="POST" action="{{ route('subduas.store', ['dua' => $dua]) }}"> {{--  //! Clase  31 tenia action en lugar de method --}}
        <form method="POST" action="{{ route('subduas.store') }}"> {{--  //! Clase  31 tenia action en lugar de method --}}
            @csrf
             @method("PUT") {{-- //! Clase  33 --}}
             
        <div class="form_row">
           
            <input class="form-control" maxlength="60" type="hidden" readonly name="dua"  value={{ $dua }} >
        </div> <br>
            <div class="form_row">
                
                <div class="form_row">
                    <label>Nom SubDua</label>
                    <input class="form-control" maxlength="60" type="text" name="nomsubdua"   requiered>
                </div> <br>
                <div class="form_row">
                    <label>Dom SubDua</label>
                    <input class="form-control" maxlength="40" type="text" name="sububicacion"   requiered>
                    <br>
                </div> <br>
              
    
    
                {{-- <select id="ddlCol" class="ddl" onchange="this.form.submit()"> --}}
                <select id="ddlCol" onchange="updateCvecol(this.value)">
    
                    <option value="" selected>Selecciona Colonia</option>
                    @foreach ($icolonias as $colonia)
                        <option value="{{ $colonia->colonia }}">{{ $colonia->nomcol }}</option>
                    @endforeach
                    Colonia
                </select>
                <div class="form_row">
                    <input class="form-control" type="hidden" name="colonia"   requiered>
                    <br>
                </div> <br>
    
                <div class="form_row">
                    <label>Zona</label>
                    <input class="form-control" maxlength="04" type="text" name="zona"  requiered>
                    <br>
                </div> <br>
                <div class="form_row">
                    <label>subeexp</label>
                    <input class="form-control" maxlength="08" type="text" name="subeexp"   requiered>
                    <br>
                </div> <br>
                <div class="form_row">
                    <label>Tel. Subdua</label>
                    <input class="form-control" maxlength="20" type="text" name="subtelefono"   requiered>
                    <br>
                </div> <br>
                <div class="form_row">
                    <label>Giro</label>
                    <input class="form-control" maxlength="40" type="text" name="subdesgiro"  requiered>
                    <br>
                </div> <br>
                <div class="form_row">
                    <label>Uso de Suelo</label>
                    <input class="form-control" maxlength="40" type="text" name="subusossuelo"  requiered>
                    <br>
                </div> <br>
                <div class="form_row">
                    <label>RFC SubDua</label>
                    <input class="form-control" maxlength="20" type="text" name="subrfc"   requiered>
                    <br>
                </div> <br>
                <br>
                <div class="form_row">
                    <label>Nombre Propietario</label>
                    <input class="form-control" maxlength="40" type="text" name="propnom"   requiered>
                    <br>
                </div> <br>
                <div class="form_row">
                    <label>Dom. Propietario</label>
                    <input class="form-control" maxlength="40" type="text" name="propdir"  requiered>
                    <br>
                </div> <br>
                <div class="form_row">
                    <label>Tel. Propietario</label>
                    <input class="form-control" maxlength="20" type="text" name="proptel"   requiered>
                    <br>
                </div> <br>
        
                <form action="/action_page.php">
                    <label for="fechabaja">Fecha Baja:</label><br><br>
                    <input type="text" maxlength="08"id="fbajax" name="fbajax" placeholder="AAAAMMDD" pattern="[0-9]{8}"  ><br><br>
                    <small>Format Ejemplo: 20230512</small><br><br>
    
                </form>
    
    
                <div class="form_row">
                    <button type="submit" class="btn btn-primary btn-lg">Actualiza SUBDUA</button>
    
                </div> <br>
    
    
    
        </form>
        <script>
            function updateCvecol(value) {
                document.getElementsByName("colonia")[0].value = value;
            }
        </script>
    @endsection
