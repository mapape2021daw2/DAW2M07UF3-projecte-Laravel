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
                            <th scope="col">Quota mensual</th>
                            <th scope="col">Aportacions voluntàries</th>
                            <th scope="col">Aportació anual</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($socis as $soci) 
                    <tr>
                        <td>{{ $soci->nif }}</td>
                        <td>{{ $soci->nom }}</td>
                        <td>{{ $soci->adreca }}</td>   
                        <td>{{ $soci->poblacio }}</td> 
                        <td>{{ $soci->comarca }}</td>      
                        <td>{{ $soci->telefon }}</td>  
                        <td>{{ $soci->mobil }}</td>  
                        <td>{{ $soci->email }}</td>  
                        <td>{{ $soci->quota }}</td> 
                        <td>{{ $soci->aport_volunt }}</td>  
                        <td>{{ $soci->aportacio }}</td>         
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection