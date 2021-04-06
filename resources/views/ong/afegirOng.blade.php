@extends('layouts.app')

@section('content')
    @if(\Session::has('Exit'))
        <div class="alert alert-success">
            <p>{{\Session::get('Exit')}}</p>
        </div>
    @endif
    <div class="container col-5">
        <div class="content">
            <h2 style="text-align: center">AFEGIR ONG</h2>
            <form action="/afegirOng" method="post" class="form-group">
                @csrf
                <label for="">CIF</label>
                <input class="form-control" type="text" placeholder="CIF" name="cif" required>
                <label for="">Adreça</label>
                <input class="form-control" type="text" placeholder="Adreça" name="adreca" required>
                <label for="">Població</label>
                <input class="form-control" type="text" placeholder="Població" name="poblacio" required>
                <label for="">Comarca</label>
                <input class="form-control" type="text" placeholder="Comarca" name="comarca" required>
                <label for="">Tipus d'ONG</label>
                <input class="form-control" type="text" placeholder="Tipus ONG" name="tipus" required><br>
                <label for="">Declarada com d'utilitat pública</label><br>
                Sí<input name="utilitat_publica" type="checkbox" value="1"><br>
                No<input name="utilitat_publica" type="checkbox" value="0"><br>
                <input type="submit" class="btn btn-success mt-4 col-2" value="Enviar">
            </form>
        </div>
    </div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 2dbd39b27258d24c8f128ee263833c240f944f38
