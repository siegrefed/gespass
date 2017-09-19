<!DOCTYPE html>
<html>
    <head>
        <title>Perfil</title>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('estilos.css') }}">
        
    </head>    
    <body>
        <h1>Index</h1>

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
                    
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td><a href="{{ route('user.edit', $data->id) }}">modficar user</a></td>
                        
                       
                    </tr>
                </tbody>
                
           
        </table>
        @endif
        </form>
        </div>
        <div id="backtolist">
            <h5><a href="{{ route('user.index') }}">Volver al listado</a></h5>

        </div>
    </body> 
    
</html>