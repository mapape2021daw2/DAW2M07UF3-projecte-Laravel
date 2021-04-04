@extends('layouts.app')

@section('content')
    @if(\Session::has('Exit'))
        <div class="alert alert-success">
            <p>{{\Session::get('Exit')}}</p>
        </div>
    @endif
    <div class="container">
        <div class="content">
            <h2 style="text-align: center">ESBORRAR USUARI</h2>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOM</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">CREACIÓ</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users ?? '' as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <form action="deleteUsers/deleteUser/{{$user->id}}" method="get">
                                <button class="btn btn-danger" type="submit">Esborra</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection