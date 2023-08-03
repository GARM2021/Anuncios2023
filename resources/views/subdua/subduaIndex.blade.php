 @extends('layouts.master') {{-- //! Clase  30  --}}

 @section('content')


     <h6 style="margin-left: 2%;"> Lista de SUBDUAS</h6>

     @empty($items)
         <div class="alert alert-warning"> The list de Duas esta vacia</div>
     @else
         <h6 style="margin-left: 2%;">DUA {{ $ditems->dua }}</h6>
         <h6 style="margin-left: 2%;">{{ $ditems->nomdua }}</h6>

         <a href="{{ route('subduas.create', ['dua' => str_pad($ditems->dua, 6, '0', STR_PAD_LEFT), 'nomdua' => $ditems->nomdua]) }}"
            style="margin-left: 2%;" class="btn btn-success">Crea nuevo SubDua</a>

         </h2>
         <div class="table-container table-responsive">
             <table class="table-striped table-container">

                 <thead class="thead-fixed text-secondary">
                     <tr>
                         <th>subdua</th>
                         <th>nomsubdua</th>
                         <th>dua</th>
                         <th>sububicacion</th>
                         <th>zona</th>
                         <th>colonia</th>
                         <th>Nombre Colonia</th>
                         <th>subeexp</th>
                         <th>subtelefono</th>
                         <th>subdesgiro</th>
                         <th>subusossuelo</th>
                         <th>subrfc</th>
                         <th>propnom</th>
                         <th>propdir</th>
                         <th>proptel</th>
                         <th>fbajax</th>
                         <th>Total Area</th>

                         <th> A C </th>
                         <th> T I </th>
                         <th> O N </th>
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
                             <td>{{ number_format($item->totalarea, 2, ',', '.') }}</td>


                             <td> <a href="{{ route('subduas.edit', ['subdua' => str_pad($item->subdua, 6, '0', STR_PAD_LEFT)]) }}"
                                     class="btn btn-link"> Actualiza SUBDUA</td>
                             <td> <a href="{{ route('anuncios.lanuncios', ['subdua' => str_pad($item->subdua, 6, '0', STR_PAD_LEFT)]) }}"
                                     class="btn btn-link"> ANUNCIOS</td>



                         </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
     @endempty
 @endsection
