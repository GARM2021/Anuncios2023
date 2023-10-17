{{-- @extends('layouts.master') --}}
@extends('layouts.app') {{-- //! Clase  30  --}}

@section('content')



    @empty($items)
        <div class="alert alert-warning"> The list de Duas esta vacia</div>
    @else
        <h6 style="margin-left: 2%;"> Lista de ANUNCIOS</h6>

        <h5 style="margin-left: 2%;">DUA {{ $ditems->dua }}</h5>
        <h5 style="margin-left: 2%;">{{ $ditems->nomdua }}</h5>
        <h6 style="margin-left: 2%;">SUBDUA {{ $subdua }}</h6>
        <h6 style="margin-left: 2%;">{{ $nomsubdua }}</h6>
        <h6 style="margin-left: 2%;">{{ str_replace("/", "÷", $sububicaion)  }}</h6>



        {{-- return redirect()->route('nombre_ruta_destino', ['parametro1' => $parametro1, 'parametro2' => $parametro2]);
        <a href="{{ route('duas.create')  }}" class="btn btn-success">Crea nuevo Dua</a>
        <a href="{{ route('anuncios.create')  }}" class="btn btn-success">Crea nuevo Anuncio</a> --}}
        {{-- <a href="  return redirect()->route('anuncios.create', [{{'dua' => $ditems->dua}}, {{'nomdua' => $ditems->nomdua}}, {{'subdua' => $subdua}}, {{'nomsubdua' => $nomsubdua] }})" class="btn btn-success">Crea nuevo Anuncio</a>; --}}
        {{-- {{ dump($ditems->dua);}}  --}}
        {{-- str_pad($items->cuenta, 6, '0', STR_PAD_LEFT)    'dua' => $ditems->dua, --}}
        <div class="table-container table-responsive">
            <table class="table-striped table-container">
                <tr style="margin-left: 3%;">
                    <td>
                        <a href="{{ route('anuncios.create', ['dua' => str_pad($ditems->dua, 6, '0', STR_PAD_LEFT), 'nomdua' => $ditems->nomdua, 'subdua' => str_pad($subdua, 6, '0', STR_PAD_LEFT), 'nomsubdua' => $nomsubdua, 'sububicaion' => str_replace("/", "÷", $sububicaion)]) }}"
                            class="btn btn-success">Nuevo Anuncio</a>
                    </td>
                    <td>
                        <a href="{{ route('adeudos.create', ['dua' => str_pad($ditems->dua, 6, '0', STR_PAD_LEFT), 'nomdua' => $ditems->nomdua, 'subdua' => str_pad($subdua, 6, '0', STR_PAD_LEFT), 'nomsubdua' => $nomsubdua, 'sububicaion' => str_replace("/", "÷", $sububicaion)]) }}"
                            class="btn btn-success">Genera Adeudos</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="table-container table-responsive">
            <table class="table-striped table-container">
                <thead class="thead-fixed text-secondary">
                    <tr>
                        <th>cuenta</th>
                        <th>concepto</th>
                        <th>numper</th>
                        <th>fperm</th>
                        <th>finicio</th>
                        <th>ftermino</th>
                        <th>tipoanuncio</th>
                        <th>vistas</th>
                        {{-- <th>largo</th>
                        <th>ancho</th> --}}
                        <th>area</th>
                        <th>leyenda</th>
                        <th>num_anun_temp</th>
                        <th>dias</th>
                        <th> fpago </th>
                        <th>recof</th>
                        <th>fpagocap</th>
                        <th>recofcap</th>
                        <th>nombrecap</th>
                        <th>yearpagocap</th> 
                        <th> fbajax </th>
                        <th>fnotifica</th>
                        <th>freq</th>
                        <th>cvereq</th>
                        <th>fembargo</th>
                        <th>status</th>
                        <th>usuario_mov</th>
                        <th>fcaptura</th>
                        <th>horacap</th>
                        <th>capturista</th>
                        <th>A C </th>
                        <th>T I </th>
                        <th>O N </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        {{-- //! Clase 29 --}}


                        <tr class="highlight-on-hover">
                            <td>{{ $item->cuenta }}</td>
                            <td>{{ $item->concepto }}</td>
                            <td>{{ $item->numper }}</td>
                            <td>{{ $item->fperm }}</td>
                            <td>{{ $item->finicio }}</td>
                            <td>{{ $item->ftermino }}</td>
                            <td>{{ $item->tipoanuncio }}</td>
                            <td>{{ $item->vistas }}</td>
                            {{-- <td>{{ $item->largo}}</td>
                        <td>{{ $item->ancho}}</td> --}}
                            <td>{{ number_format($item->area, 2, '.', ',') }}</td>
                            <td>{{ $item->leyendaanuncio }}</td>
                            <td>{{ $item->num_anun_temp }}</td>
                            <td>{{ $item->dias }}</td>
                            <td>{{ $item->fpago }}</td>
                            <td>{{ $item->recof}}</td>
                        <td>{{ $item->fpagocap}}</td>
                        <td>{{ $item->recofcap}}</td>
                        <td>{{ $item->nombrecap}}</td>
                        <td>{{ $item->yearpagocap}}</td> 
                            <td>{{ $item->fbajax }}</td>
                            <td>{{ $item->fnotifica }}</td>
                            <td>{{ $item->freq }}</td>
                            <td>{{ $item->cvereq }}</td>
                            <td>{{ $item->fembargo }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->usuario_mov }}</td>
                            <td>{{ $item->fcaptura }}</td>
                            <td>{{ $item->horacap }}</td>
                            <td>{{ $item->capturista }}</td>
                            <td> <a href="{{ route('anuncios.edit', ['cuenta' => str_pad($item->cuenta, 6, '0', STR_PAD_LEFT)]) }}"
                                    class="btn btn-warning btn-sm"> Actualiza </td>
                            <td> <a href="{{ route('anuncios.show', ['cuenta' => str_pad($item->cuenta, 6, '0', STR_PAD_LEFT)]) }}"
                                    class="btn btn-info btn-sm"> Muestra </td>



                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endempty
@endsection
