<!DOCTPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Esborrar les dades de les ONGs</title>
    </head>
    <body>
        @if(\Session::has('Exit'))
            <div class="alert alert-success">
                <p>{{\Session::get('Exit')}}</p>
            </div>
        @endif
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">CIF</th>
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
                    <td>{{ $ong->cif }}</td>
                    <td>{{ $ong->adreca }}</td>
                    <td>{{ $ong->poblacio }}</td>   
                    <td>{{ $ong->comarca }}</td> 
                    <td>{{ $ong->tipus }}</td>  
                    <td><a href = 'esbong/{{$ong->cif}}'>Esborra</a></td>          
                </tr>
            @endforeach
            </tbody>
        </table>
    </body>
</html>
