 {{-- @extends('layouts.master') --}}
@extends('layouts.app') {{-- //! Clase  30  --}}

 @section('content')


     <h5 style="margin-left: 2%;"> Lista de SUBDUAS</h5>

     @empty($items)
         <div class="alert alert-warning"> The list de Duas esta vacia</div>
     @else
        
         <h6 style="margin-left: 2%;">DUA {{ $ditems->dua }}</h6>
         <h6 style="margin-left: 2%;">{{ $ditems->nomdua }}</h6>
        <h2>
         <a href="{{ route('subduas.create', ['dua' => str_pad($ditems->dua, 6, '0', STR_PAD_LEFT), 'nomdua' => $ditems->nomdua]) }}"
             style="margin-left: 2%;" class="btn btn-success">Nuevo SubDua</a>

         </h2>
        
         <div class="table-container table-responsive">
             <table class="table-striped table-container">

                 <thead class="thead-fixed text-secondary">
                     <tr>
                         <th>dua</th>
                         <th>nomsubdua</th>
                         <th>dua</th>
                         <th>ubicacion</th>
                         <th>zona</th>
                         <th>colonia</th>
                         <th>Nombre Colonia</th>
                         <th>eexp</th>
                         <th>telefono</th>
                         <th>desgiro</th>
                         <th>usossuelo</th>
                         <th>rfc</th>
                         <th>propnom</th>
                         <th>propdir</th>
                         <th>proptel</th>
                         <th>fbajax</th>
                         <th>Total Area</th>

                         <th colspan="3" width="100px">A C T I O N</th>
                     </tr>
                 </thead>

                 <tbody>
                     @foreach ($items as $item)
                         {{-- //! Clase 29 --}}


                         <tr class="highlight-on-hover">
                             <td>{{ $item->subdua }}</td>
                             <td>{{ $item->nomsubdua }}</td>
                             <td>{{ $item->dua }}</td>
                             <td>{{ $item->sububicaion }}</td>
                             <td>{{ $item->zona }}</td>
                             <td>{{ $item->colonia }}</td>
                             <td>{{ $item->nomcol }}</td>
                             <td>{{ $item->subeexp }}</td>
                             <td>{{ $item->subtelefono }}</td>
                             <td>{{ $item->subdesgiro }}</td>
                             <td>{{ $item->subusossuelo }}</td>
                             <td>{{ $item->subrfc }}</td>
                             <td>{{ $item->propnom }}</td>
                             <td>{{ $item->propdir }}</td>
                             <td>{{ $item->proptel }}</td>
                             <td>{{ $item->fbajax }}</td>
                             <td>{{ number_format($item->totalarea, 2, '.', ',') }}</td>

                             <td> <a href="{{ route('anuncios.lanuncios', ['subdua' => str_pad($item->subdua, 6, '0', STR_PAD_LEFT)]) }}"
                                class="btn btn-primary btn-sm">Anuncios</td>

                             <td> <a href="{{ route('subduas.edit', ['subdua' => str_pad($item->subdua, 6, '0', STR_PAD_LEFT)]) }}"
                                class="btn btn-warning btn-sm">Actualiza</td>



                         </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
     @endempty
 @endsection
