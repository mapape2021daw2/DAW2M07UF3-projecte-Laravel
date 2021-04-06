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
                                <a href="{{ route('addUsers') }}" class="text-white">Afegir</a>
                            </button>
                            <button class="btn btn-secondary" style="text-align: center; width: 20%; margin: 10px 10px 10px 10px;">
                                <a href="{{ route('modifyUsers') }}" class="text-white">Modificar</a>
                            </button>
                            <button class="btn btn-dark" style="text-align: center; width: 20%; margin: 10px 10px 10px 10px;">
                                <a href="{{ route('deleteUsers') }}" class="text-white">Eliminar</a>
                            </button>
                            <button class="btn btn-primary" style="text-align: center; width: 20%; margin: 10px 10px 10px 10px;">
                                <a href="{{ route('listUsers') }}" class="text-white">Mostrar</a>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
