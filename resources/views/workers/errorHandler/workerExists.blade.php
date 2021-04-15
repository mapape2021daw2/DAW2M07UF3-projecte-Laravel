@extends('layouts.app')

@section('content')
    @if(\Session::has('Exit'))
        <div class="alert alert-success">
            <p>{{\Session::get('Exit')}}</p>
        </div>
    @endif
    <div class="container col-5">
        <div class="content">
            <h1 style="color: red">ERROR</h1>
            <h2>Ja existeix un treballador registrat amb aquest NIF</h2>
            <a href=" {{ route('addWorkers') }} " class="btn btn-primary">Torna enrere</a>
        </div>
    </div>
@endsection
