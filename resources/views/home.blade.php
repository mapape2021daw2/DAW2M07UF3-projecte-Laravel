@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Menú principal') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <button class="btn btn-success" style="text-align: center; width: 100%; margin: 10px 0 10px 0;">
                            <a href="{{ route('ongCrudOptions') }}" class="text-white">Manteniment de les dades de la CCONG</a>
                        </button>
                        <button class="btn btn-secondary" style="text-align: center; width: 100%; margin: 10px 0 10px 0;">
                            <a href="{{ route('sociCrudOptions') }}" class="text-white">Manteniment de les dades dels socis de la CCONG</a>
                        </button>
                        <button class="btn btn-dark" style="text-align: center; width: 100%; margin: 10px 0 10px 0;">
                            <a href="{{ route('home') }}" class="text-white">Manteniment de les dades dels treballadors de la CCONG</a>
                        </button>
                        @if(auth()->user()->is_admin)
                        <button class="btn btn-primary" style="text-align: center; width: 100%; margin: 10px 0 10px 0;">
                            <a href="{{ route('usersCrudOptions') }}" class="text-white">Manteniment de les dades d'usuaris de l'aplicació</a>
                        </button>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
