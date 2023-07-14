
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <!-- Enlaces a las vistas -->
                    <div>
                        <a href="http://localhost:8000/duas">Gestion de DUAS</a>
                    </div>
                    {{-- <div>
                        <a href="{{ route('colonia.index') }}">Colonia</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
