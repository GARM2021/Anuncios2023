@extends('layouts.master')
@section('content')
   

    {{-- //! Clase 31 --}}
    <h1>Crea DUA</h1>
    <form action="POST" action {{ route('duas.store') }}>
        <div class="form_row">
            <div class="form_row">
                <label>Dua</label>
                <input class="form-control" type="text" name="dua" required>
            </div>
            <div class="form_row">
                <label>NomDua</label>
                <input class="form-control" type="text" name="nomdua" required>
            </div>
            <div class="form_row">
                <label>DomDua</label>
                <input class="form-control" type="text" name="domdua" required>
            </div>
            <div class="form_row">
                <label>Colonia</label>
                <input class="form-control" type="text" name="colonia" required>
            </div>
            <div class="form_row">
                <label>Nom. Col.</label>
                <input class="form-control" type="text" name="nomcol" required>
            </div>
            <div class="form_row">
                <label>Ciudad</label>
                <input class="form-control" type="text" name="ciudad" required>
            </div>
            <div class="form_row">
                <label>Propietario</label>
                <input class="form-control" type="text" name="prop" required>
            </div>
            <div class="form_row">
                <label>Tel. Propietario</label>
                <input class="form-control" type="text" name="telprop" required>
            </div>
            <div class="form_row">
                <label>Rep. Legal</label>
                <input class="form-control" type="text" name="rep_legal" required>
            </div>
            <div class="form_row">
                <label>RFC Dua</label>
                <input class="form-control" type="text" name="rfc_dua" required>
            </div>
            <div class="form_row">
                <label>Seguro</label>
                <input class="form-control" type="text" name="seguro" required>
            </div>
            <div class="form_row">
                <label>Fecha Ini.</label>
                <input class="form-control" type="text" name="fechaini" required>
            </div>
            <div class="form_row">
                <label>Fecha Fin</label>
                <input class="form-control" type="text" name="fechafin" required>
            </div>
            <div class="form_row">
                <label>Fecha Baja</label>
                <input class="form-control" type="text" name="fbajax" required>
            </div>
            <div class="form_row">
                <button type="submit" class="btn btn-primary btn-lg">Inserta DUA</button>
                
            </div>



    </form>
@endsection
