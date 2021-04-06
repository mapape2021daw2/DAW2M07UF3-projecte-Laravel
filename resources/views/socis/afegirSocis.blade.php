@extends('layouts.app')

<head>
    <script src="{{ asset('js/socis.js') }}" defer></script>
</head>

@section('content')
    @if(\Session::has('Exit'))
        <div class="alert alert-success">
            <p>{{\Session::get('Exit')}}</p>
        </div>
    @endif
    <div class="container col-5">
        <div class="content">
            <h2 style="text-align: center">AFEGIR SOCI</h2>
            <form action="/afegirSocis" method="post" class="form-group">
                @csrf
                <label for="">NIF</label>
                <input class="form-control" type="text" placeholder="NIF" name="nif" required>
                <label for="">Nom</label>
                <input class="form-control" type="text" placeholder="Nom" name="nom" required>
                <label for="">Cognoms</label>
                <input class="form-control" type="text" placeholder="Cognoms" name="cognoms" required>
                <label for="">Adreça</label>
                <input class="form-control" type="text" placeholder="Adreça" name="adreca" required>
                <label for="">Població</label>
                <input class="form-control" type="text" placeholder="Població" name="poblacio" required>
                <label for="">Comarca</label>
                <input class="form-control" type="text" placeholder="Comarca" name="comarca" required>
                <label for="">Telèfon fixe</label>
                <input class="form-control" type="telf" placeholder="Telèfon" name="telefon" required>
                <label for="">Telèfon mòbil</label>
                <input class="form-control" type="telf" placeholder="Mòbil" name="mobil" required>
                <label for="">Email</label>
                <input class="form-control" type="email" placeholder="Email" name="email" required>
                <label for="">Data d'alta</label>
                <input class="form-control" type="date" placeholder="Data d'alta" name="data_alta" required>
                <label for="">Quota mensual</label>
                <input onblur="trobarTotal()" class="quantitat form-control" type="text" placeholder="Quota mensual" name="quota" required>
                <label for="">Aportacions voluntàries</label>
                <input onblur="trobarTotal()" class="quantitat form-control" type="text" placeholder="Aportacions voluntàries" name="aport_volunt" required>
                <label for="">Aportació anual</label>
                <input class="form-control" id="total" type="text" name="aport_anual" readonly>
                <input type="submit" class="btn btn-success mt-4 col-2" value="Enviar">
            </form>
        </div>
    </div>
@endsection