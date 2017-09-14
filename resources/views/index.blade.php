<!DOCTYPE html>
<html>
    <head>
        <title>Index</title>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('estilos.css') }}">
        
    </head>    
    <body>
        <h1>Index</h1>
        <h4><a href = "{{ route('user.create') }}">Crear nuevo usuario</a></h4>

        <div id="table">
        
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
        @if($data)
        <table>
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Creado</th>

   
                </thead>
               
                <tbody>
                 @foreach($data as $row)
                    
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td><a href="{{ route('user.edit') }}">modficar user</a></td>
                        
                       
                    </tr>
                </tbody>
                @endforeach
           
        </table>
        @endif
        </form>
        </div>
        <div id="backtolist">
            <h5><a href="{{ route('user.index') }}">Volver al listado</a></h5>

        </div>
    </body> 
    
</html>