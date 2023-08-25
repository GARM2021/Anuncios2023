 @extends('layouts.master') {{-- //! Clase  30  --}}

 @section('content')


     <h5 style="margin-left: 2%;"> Lista de DUAS </h5>
  {{-- @dd($items) --}}

     @empty($items)
         <div class="alert alert-warning"> The list de Duas esta vacia</div>
     @else
         <h1>

             <a href="{{ route('duas.create') }}"  style="margin-left: 2%;" class="btn btn-success">Crea nuevo Dua</a>
         </h1>
       
         <div class="table-container table-responsive">

             <table class="table-striped table-container">
                 {{-- <div class="table-header-container">  --}}
                 <thead class="thead-fixed text-secondary">
                     <tr>
                         <th>DUA</th>
                         <th>nomdua</th>    
                         <th>domdua</th>
                         <th>colonia</th>
                         <th>Nombre Colonia</th>
                         <th>fechaini</th>
                         <th>fechafin</th>
                         <th>fbajax</th>
                         <th>Total AREA </th>
                         {{-- <th colspan="3">A C T I O N</th> --}}
                         <th colspan="3" width="100px">A C T I O N</th>

                     </tr>
                 </thead>
                 {{-- </div> --}}
                 <tbody>
                     @foreach ($items as $item)
                         <tr class="highlight-on-hover">

                             <td>{{ $item->dua }}</td>
                             <td>{{ $item->nomdua }}</td>
                             <td>{{ $item->domdua }}</td>
                             <td>{{ $item->colonia }}</td>
                             <td>{{ $item->nomcol }}</td>
                             <td>{{ $item->fechaini }}</td>
                             <td>{{ $item->fechafin }}</td>
                             <td>{{ $item->fbajax }}</td>
                             <td>{{ number_format($item->totalarea,  2, '.', ',') }}</td>
                             <td> <a href="{{ route('duas.show', ['dua' => str_pad($item->dua, 6, '0', STR_PAD_LEFT)]) }}"
                                class="btn btn-info btn-sm"> Muestra </td>
                             <td> <a href="{{ route('duas.edit', ['dua' => str_pad($item->dua, 6, '0', STR_PAD_LEFT)]) }}"
                                class="btn btn-warning btn-sm"> Actualiza </td>
                             <td> <a href="{{ route('subduas.lsubduas', ['dua' => str_pad($item->dua, 6, '0', STR_PAD_LEFT)]) }}"
                                class="btn btn-primary btn-sm"> Lista SubDuas</td>


                         </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
        
     @endempty
 @endsection
