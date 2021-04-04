@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Opcions') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container" style="display: flex; justify-content: center">
                            <button class="btn btn-success" style="text-align: center; width: 20%; margin: 10px 10px 10px 10px;">
                                <a href="{{ route('addWorkers') }}" class="text-white">Afegir un treballador</a>
                            </button>
                            <button class="btn btn-secondary" style="text-align: center; width: 20%; margin: 10px 10px 10px 10px;">
                                <a href="{{ route('modifyWorkers') }}" class="text-white">Modificar un treballador</a>
                            </button>
                            <button class="btn btn-dark" style="text-align: center; width: 20%; margin: 10px 10px 10px 10px;">
                                <a href="{{ route('deleteWorkers') }}" class="text-white">Eliminar un treballador</a>
                            </button>
                            <button class="btn btn-primary" style="text-align: center; width: 20%; margin: 10px 10px 10px 10px;">
                                <a href="{{ route('listWorkers') }}" class="text-white">Mostrar treballadors</a>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
