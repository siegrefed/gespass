<!DOCTYPE html>
<html>
    <head>
        <title>Modificar Usuario</title>
        <link rel="stylesheet" type="text/css" href="estilos.css">
        
    </head>    
    <body>
        <h1>Modificar Usuarios</h1>
        <div id="table">
        <form action="/gestpass/public/user/{{$data->id}}" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        
       
        @if($data)
        <table>
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Avatar</th>
   
                </thead>
                <tbody>
                
                
                    <tr>
                        <td><input type="text" name="name" placeholder="{{ $data->name }}"></td>
                        <td><input type="text" name="email" placeholder="{{ $data->email }}"></td>
                        <td><input type="text" name="password" placeholder="Introduzca la contraseña"><br>
                            <input type="text" name="password1" placeholder="Introduzca de nuevo la contraseña"></td>
                        <td><input type="text" name="avatar" placeholder="{{ $data->avatar }}"></td>
                       
                    </tr>
                    <tr>
                        <td  colspan="4"><input type="submit" value="Modificar Usuario"/></td>
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

