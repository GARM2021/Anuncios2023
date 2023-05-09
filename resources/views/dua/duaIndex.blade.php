@extends('layouts.master')


    <h1> Lista de DUAS</h1>

    @empty ($items)

    <div class="alert alert-warning"> The list de Duas esta vacia</div>

    @else
        <div class="table-responsive">
            <table class="table-stripped">
                <thead class="thead-light">
                    <tr>
                        <th>DUA</th>
                        <th>nomdua</th>
                        <th>domdua</th>
                        <th>colonia</th>
                        <th>Nombre Colonia</th>
                        <th>ciudad</th>
                        <th>prop</th>
                        <th>telprop</th>
                        <th>rep_legal</th>
                        <th>rfc_dua</th>
                        <th>seguro</th>
                        <th>fechaini</th>
                        <th>fechafin</th>
                        <th>fbajax</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item ) {{-- //! Clase 29 --}}
                        
                  
                    <tr>
                        <td>{{ $item->dua}}</td>
                        <td>{{ $item->nomdua}}</td>
                        <td>{{ $item->domdua}}</td>
                        <td>{{ $item->colonia}}</td>
                        <td>{{ $item->nomcol}}</td> 
                        <td>{{ $item->ciudad}}</td>
                        <td>{{ $item->prop}}</td> 
                        <td>{{ $item->telprop}}</td>
                        <td>{{ $item->rep_legal}}</td>
                        <td>{{ $item->rfc_dua}}</td>
                        <td>{{ $item->seguro}}</td>
                        <td>{{ $item->fechaini}}</td>
                        <td>{{ $item->fechafin}}</td>
                        <td>{{ $item->fbajax}}</td>
                        


                    </tr>
               
                    @endforeach
                </tbody>
            </table>
        </div>
    @endempty

