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
                            <th scope="col">#</th>
                            <th scope="col">NIF</th>
                            <th scope="col">Adreça</th>
                            <th scope="col">Població</th>
                            <th scope="col">Comarca</th>
                            <th scope="col">Tipus ONG</th>
                            <th scope="col">Utilitat pública</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($ongs as $ong) 
                    <tr>
                        <td>{{ $ong->id }}</td>
                        <td>{{ $ong->nif }}</td>
                        <td>{{ $ong->adreca }}</td>
                        <td>{{ $ong->poblacio }}</td>   
                        <td>{{ $ong->comarca }}</td> 
                        <td>{{ $ong->tipus }}</td>            
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection