 @extends('layouts.master')  {{-- //! Clase  30  --}} 

@section('content')
    

    <h1> Lista de DUAS</h1>

    @empty ($items)

    <div class="alert alert-warning"> The list de Duas esta vacia</div>


    @else
      <h1>
        <a href="{{ route('duas.create')  }}" class="btn btn-success">Crea nuevo Dua</a>
      </h1>
        <div class="table-responsive">
            <table class="table-stripped">
                <thead class="thead-light">
                    <tr>
                        <th>DUA</th>
                        <th>nomdua</th>
                        <th>domdua</th>
                        <th>colonia</th>
                        <th>Nombre Colonia</th>
                        <th>fechaini</th>
                        <th>fechafin</th>
                        <th>fbajax</th>
                        <th>A C T I O N</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item ) 
                        
                  
                    <tr>
                        <td>{{ $item->dua}}</td>
                        <td>{{ $item->nomdua}}</td>
                        <td>{{ $item->domdua}}</td>
                        <td>{{ $item->colonia}}</td>
                        <td>{{ $item->nomcol}}</td> 
                        <td>{{ $item->fechaini}}</td>
                        <td>{{ $item->fechafin}}</td>
                        <td>{{ $item->fbajax}}</td>
                        <td> <a href="{{ route('duas.show', ['dua' => str_pad($item->dua, 6, '0', STR_PAD_LEFT)]) }}" class="btn btn-link"> Muestra </td>
                        <td> <a href="{{ route('duas.edit', ['dua' => str_pad($item->dua, 6, '0', STR_PAD_LEFT)]) }}" class="btn btn-link"> Actualizaxx </td>
                        <td> <a href="{{ route('subduas.lsubduas', ['dua' => str_pad($item->dua, 6, '0', STR_PAD_LEFT)]) }}" class="btn btn-link"> Lista SubDuas</td>  
                      

                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    @endempty
    @endsection

