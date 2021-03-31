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
                    <th scope="col">CIF</th>
                    <th scope="col">Adreça</th>
                    <th scope="col">Població</th>
                    <th scope="col">Comarca</th>
                    <th scope="col">Tipus associació</th>
                    <th scope="col">Utilitat pública</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($associacions ?? '' as $associacio) 
                <tr>
                    <td>{{ $associacio->id }}</td>
                    <td>{{ $associacio->cif }}</td>
                    <td>{{ $associacio->adreca }}</td>
                    <td>{{ $associacio->poblacio }}</td>   
                    <td>{{ $associacio->comarca }}</td> 
                    <td>{{ $associacio->tipus }}</td>  
                    <td>
                        <form action="esborraassociacio/esbassociacio/{{$associacio->id}}" method="get">
                            <button class="btn btn-danger" type="submit">Esborra</button>
                        </form>
                    </td>          
                </tr>
            @endforeach
            </tbody>
        </div>
    </div>
@endsection