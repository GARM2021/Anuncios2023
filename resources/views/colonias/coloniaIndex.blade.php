@extends('layouts.master')


    <h1> Lista de COLONIAS</h1>

    @empty ($items)

    <div class="alert alert-warning"> The list de Duas esta vacia</div>

    @else
        <div class="table-responsive">
            <table class="table-stripped">
                <thead class="thead-light">
                    <tr>
                        <th>Coloni</th>
                        <th>Nombre de Colonia</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item ) {{-- //! Clase 29 --}}
                        
                  
                    <tr>
                        <td>{{ $item->coloni}}</td>
                        <td>{{ $item->nomcol}}</td>
                        


                    </tr>
               
                    @endforeach
                </tbody>
            </table>
        </div>
    @endempty

