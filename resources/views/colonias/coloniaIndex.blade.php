@extends('layouts.master')


    <h1> Lista de COLONIAS</h1>

    @empty ($items)

    <div class="alert alert-warning"> The list de Duas esta vacia</div>

    @else
        <div class="table-responsive">
            <table class="table-stripped">
                <thead class="thead-light">
                    <tr>
                        <th>Colonia</th>
                        <th>Nombre de Colonia</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item ) {{-- //! Clase 29 --}}
                        
                  
                    <tr>
                        <td>{{ $item->colonia}}</td>
                        <td>{{ $item->nomcol}}</td>
                        <td> <a href="{{ route('colonias.edit', ['colonia' => str_pad($item->colonia, 6, '0', STR_PAD_LEFT)]) }}" class="btn btn-link"> Actualiza </td>
       
                    </tr>
               
                    @endforeach
                </tbody>
            </table>
        </div>
    @endempty

