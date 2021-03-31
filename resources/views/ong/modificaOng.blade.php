@extends('layouts.app')

@section('content')
    @if(\Session::has('Exit'))
        <div class="alert alert-success">
            <p>{{\Session::get('Exit')}}</p>
        </div>
    @endif
    <div class="container col-5">
        <div class="content">
            <form action="/modifyOngData" method="post" class="form-group">
                @csrf
                <label for="">CIF</label>
                <input class="form-control" type="text" placeholder="CIF" name="cif">
                <label for="">Adreça</label>
                <input class="form-control" type="text" placeholder="Adreça" name="adreca">
                <label for="">Població</label>
                <input class="form-control" type="text" placeholder="Població" name="poblacio">
                <label for="">Comarca</label>
                <input class="form-control" type="text" placeholder="Comarca" name="comarca">
                <label for="">Tipus d'ONG</label>
                <input class="form-control" type="text" placeholder="Tipus ONG" name="tipus">
                <input type="submit" class="btn btn-success mt-4 col-2" value="Enviar">
            </form>
        </div>
    </div>
@endsection