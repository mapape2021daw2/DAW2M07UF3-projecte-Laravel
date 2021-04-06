@extends('layouts.app')

@section('content')
    @if(\Session::has('Exit'))
        <div class="alert alert-success">
            <p>{{\Session::get('Exit')}}</p>
        </div>
    @endif
    <div class="container col-5">
        <div class="content">
            <h2 style="text-align: center">MODIFICAR USUARI</h2>
            <form action="/modifyUserData" method="post" class="form-group">
                @csrf
                <label for="">Email *</label>
                <input class="form-control" type="text" placeholder="Introdueix el teu email" name="email">
                <label for="">Nom</label>
                <input class="form-control" type="text" placeholder="Nom" name="name">
                <label for="">Contrasenya nova</label>
                <input class="form-control" type="password" placeholder="Contrasenya nova" name="newPassword">
                <label for="">Repeteix la contrasenya nova</label>
                <input class="form-control" type="password" placeholder="Contrasenya nova" name="newPasswordRepeat">
                <input type="submit" class="btn btn-success mt-4 col-2" value="Enviar">
            </form>
        </div>
    </div>
@endsection
