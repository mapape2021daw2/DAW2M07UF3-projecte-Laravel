@extends('layouts.app')

@section('content')
    @if(\Session::has('Exit'))
        <div class="alert alert-success">
            <p>{{\Session::get('Exit')}}</p>
        </div>
    @endif
    <div class="container col-5">
        <div class="content">
            <h2 style="text-align: center">AFEGIR USUARI</h2>
            <form action="/addUser" method="post" class="form-group">
                @csrf
                <label for="">Email *</label>
                <input class="form-control" type="email" placeholder="Introdueix el teu email" name="email" required>
                <label for="">Nom *</label>
                <input class="form-control" type="text" placeholder="Nom" name="name" required>
                <label for="">Contrasenya nova *</label>
                <input class="form-control" type="password" placeholder="Contrasenya" name="password" required>
                <label for="">Repeteix la contrasenya *</label>
                <input class="form-control" type="password" placeholder="Contrasenya" name="passwordRepeat" required>
                <label for="">Tipus *</label>
                <div>
                    <input type="radio" id="ordinary" name="user_type" value="ordinary" checked>
                    <label for="ordinary">Ordinari</label>
                    <br>
                    <input type="radio" id="admin" name="user_type" value="admin">
                    <label for="admin">Admin</label>
                </div>
                <input type="submit" class="btn btn-success mt-4 col-2" value="Enviar">
            </form>
        </div>
    </div>
@endsection