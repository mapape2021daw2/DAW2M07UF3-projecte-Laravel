@extends('layouts.app')

@section('content')
        @if(\Session::has('Exit'))
            <div class="alert alert-success">
                <p>{{\Session::get('Exit')}}</p>
            </div>
        @endif
        <div class="container">
            <div class="content">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">NIF</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Adreça</th>
                            <th scope="col">Població</th>
                            <th scope="col">Comarca</th>
                            <th scope="col">Telèfon</th>
                            <th scope="col">Mòbil</th>
                            <th scope="col">Email</th>
                            <th scope="col">Data alta</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($workers as $worker)
                    <tr>
                        <td>{{ $worker->nif }}</td>
                        <td>{{ $worker->nom }}</td>
                        <td>{{ $worker->adreca }}</td>
                        <td>{{ $worker->poblacio }}</td>
                        <td>{{ $worker->comarca }}</td>
                        <td>{{ $worker->telefon }}</td>
                        <td>{{ $worker->mobil }}</td>
                        <td>{{ $worker->email }}</td>
                        <td>{{ $worker->data_alta }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
