@extends('layouts.app')

@section('content')
    @if(\Session::has('Exit'))
        <div class="alert alert-success">
            <p>{{\Session::get('Exit')}}</p>
        </div>
    @endif
    <div class="container col-5">
        <div class="content">
            <h2 style="text-align: center">MODIFICAR UN TREBALLADOR</h2>
            <form action="/modifyWorker" method="post" class="form-group">
                @csrf
                <label for="">NIF *</label>
                <input class="form-control" type="text" placeholder="NIF" name="nif" required>
                <label for="">Nom</label>
                <input class="form-control" type="text" placeholder="Nom" name="name" required>
                <label for="">Adreça *</label>
                <input class="form-control" type="text" placeholder="Adreça" name="address" required>
                <label for="">Població *</label>
                <input class="form-control" type="text" placeholder="Població" name="city" required>
                <label for="">Comarca *</label>
                <input class="form-control" type="text" placeholder="Comarca" name="area" required>
                <label for="">Telèfon</label>
                <input class="form-control" type="telf" placeholder="Telèfon" name="phone">
                <label for="">Mòbil *</label>
                <input class="form-control" type="telf" placeholder="Mòbil" name="mobile" required>
                <label for="">Email *</label>
                <input type="email" class="form-control" placeholder="Email" name="email" required>
                <label for="">Associació *</label>
                <div>
                    <select name="asoSelection" class="col-12">
                        @foreach ($aso as $a)
                            <option value="{{$a->cif}}">{{$a->cif}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <label for="">Tipus *</label>
                <div>
                    <input type="radio" id="professional" name="workerType" value="professional" checked>
                    <label for="professional">Professional</label>
                    <br>
                    <div class="col-12">
                        <input class="col-3" type="text" name="job" placeholder="Carrec">
                        <input class="col-5" type="text" name="budget" placeholder="Quota de la seguretat social">
                        <input class="col-3" type="text" name="irpf" placeholder="IRPF">
                    </div>
                    <br>
                    <input type="radio" id="volunteer" name="workerType" value="voluntari">
                    <label for="volunteer">Voluntari</label>
                    <br>
                    <div class="col-12">
                        <input class="col-3" type="number" name="age" placeholder="Edat">
                        <input class="col-5" type="text" name="profession" placeholder="Professió">
                        <input class="col-3" type="number" name="hours" placeholder="Hores">
                    </div>
                </div>
                <input type="submit" class="btn btn-success mt-4 col-2" value="Enviar">
            </form>
        </div>
    </div>
@endsection
