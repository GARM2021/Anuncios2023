@extends('layouts.master')
@section('content')
    {{-- //! Clase 31 --}}
    <h1>Edita COLONIA</h1>
    <form method="POST" action="{{ route('colonias.update', ['colonia' => $items->colonia]) }}"> {{--  //! Clase  31 tenia action en lugar de method --}}
        @csrf
         @method("PUT") {{-- //! Clase  33 --}}
        <div class="form_row">
           
            <div class="form_row">
                <label>Nombre Colonia</label>
                <input class="form-control" maxlength="60" type="text" name="$items->nomcol"  value = {{$items->nomdua}}  requiered>
            </div> <br>
        


            <div class="form_row">
                <button type="submit" class="btn btn-primary btn-lg">Edita COLONIA/button>

            </div> <br>



    </form>
   
@endsection
