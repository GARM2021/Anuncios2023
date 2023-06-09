 @extends('layouts.master')  {{-- //! Clase  30  --}} 

@section('content')
    

    <h1> Lista de SUBDUAS</h1>

    @empty ($items)

    <div class="alert alert-warning"> The list de Duas esta vacia</div>


    @else
       <h1>DUA {{ $ditems->dua }}</h1>
       <h1>{{ $ditems->nomdua }}</h1>
      <h2>
        
       

        <a href="{{ route('subduas.create', ['dua' => str_pad($ditems->dua, 6, '0', STR_PAD_LEFT), 'nomdua' => $ditems->nomdua]) }}" class="btn btn-success">Crea nuevo SubDua</a>
        
      </h2>
        <div class="table-responsive">
            <table class="table-stripped">
                <thead class="thead-light">
                    <tr>
                        <th>subdua</th>
                        <th>nomsubdua</th>
                        <th>dua</th>
                        <th>sububicaion</th>
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
                       
                        <th>A C T I O N</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item ) {{-- //! Clase 29 --}}
                        
                  
                    <tr class="highlight-on-hover">
                        <td>{{ $item->subdua}}</td> 
                        <td>{{ $item->nomsubdua}}</td>
                        <td>{{ $item->dua}}</td>
                        <td>{{ $item->sububicaion}}</td>
                        <td>{{ $item->zona}}</td>
                        <td>{{ $item->colonia}}</td>
                        <td>{{ $item->nomcol}}</td> 
                        <td>{{ $item->subeexp}}</td>
                        <td>{{ $item->subtelefono}}</td>
                        <td>{{ $item->subdesgiro}}</td>
                        <td>{{ $item->subusossuelo}}</td>
                        <td>{{ $item->subrfc}}</td>
                        <td>{{ $item->propnom}}</td>
                        <td>{{ $item->propdir}}</td>
                        <td>{{ $item->proptel}}</td>
                        <td>{{ $item->fbajax}}</td>
                       
                    
                        <td> <a href="{{ route('subduas.edit', ['subdua' => str_pad($item->subdua, 6, '0', STR_PAD_LEFT)]) }}" class="btn btn-link"> Actualiza SUBDUA</td>
                        <td> <a href="{{ route('anuncios.lanuncios', ['subdua' => str_pad($item->subdua, 6, '0', STR_PAD_LEFT)]) }}" class="btn btn-link"> ANUNCIOS</td>
                        


                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    @endempty
    @endsection

