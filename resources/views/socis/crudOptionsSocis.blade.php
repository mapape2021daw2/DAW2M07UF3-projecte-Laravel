@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Opcions') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">
                            <button class="btn btn-success" style="text-align: center; width: 20%; margin: 10px 10px 10px 10px;">
                                <a href="{{ route('afegirSocis') }}" class="text-white">Afegir un soci</a>
                            </button>
                            <button class="btn btn-secondary" style="text-align: center; width: 20%; margin: 10px 10px 10px 10px;">
                                <a href="{{ route('modificaSocis') }}" class="text-white">Modificar un soci</a>
                            </button>
                            <button class="btn btn-dark" style="text-align: center; width: 20%; margin: 10px 10px 10px 10px;">
                                <a href="{{ route('esborraSocis') }}" class="text-white">Eliminar un soci</a>
                            </button>
                            <button class="btn btn-primary" style="text-align: center; width: 20%; margin: 10px 10px 10px 10px;">
                                <a href="{{ route('mostraSocis') }}" class="text-white">Mostrar un soci</a>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
