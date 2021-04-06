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
                    <th scope="col">CIF</th>
                    <th scope="col">Adreça</th>
                    <th scope="col">Població</th>
                    <th scope="col">Comarca</th>
                    <th scope="col">Tipus associació</th>
                    <th scope="col">Utilitat pública</th>
                    <th scope="col"></th>
                </tr>
<<<<<<< HEAD
            </thead>
            <tbody>
            @foreach ($ongs as $ong) 
                <tr>
                    <td>{{ $ong->cif }}</td>
                    <td>{{ $ong->adreca }}</td>
                    <td>{{ $ong->poblacio }}</td>   
                    <td>{{ $ong->comarca }}</td> 
                    <td>{{ $ong->tipus }}</td>  
                    <td>
                        <form action="esborraOng/esbOng/{{$ong->cif}}" method="get">
                            <button class="btn btn-danger" type="submit">Esborra</button>
                        </form>
                    </td>          
                </tr>
            @endforeach
            </tbody>
        </div>
    </div>
@endsection
=======
                </thead>
                <tbody>
                @foreach ($ongs as $ong)
                    <tr>
                        <td>{{ $ong->cif }}</td>
                        <td>{{ $ong->adreca }}</td>
                        <td>{{ $ong->poblacio }}</td>
                        <td>{{ $ong->comarca }}</td>
                        <td>{{ $ong->tipus }}</td>
                        <td>
                            <form action="esborraOng/esbOng/{{$ong->cif}}" method="get">
                                <button class="btn btn-danger" type="submit">Esborra</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
        </div>
    </div>
@endsection
>>>>>>> 2dbd39b27258d24c8f128ee263833c240f944f38
