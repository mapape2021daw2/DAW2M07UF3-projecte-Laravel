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
            <h2>Dades introduides incorrectes, torna a intentar-ho.</h2>
            <p>Comprova que el correu electrònic sigui correcte i les contrassenyes coincideixin.</p>
            <a href=" {{ route('addUsers') }} " class="btn btn-primary">Torna enrere</a>
        </div>
    </div>
@endsection
