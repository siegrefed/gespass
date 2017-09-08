<!DOCTYPE html>
<html>
    <head>
        <title>Nuevos Usuarios</title>
        <link rel="stylesheet" type="text/css" href="estilos.css">
        
    </head>    
    <body>
        <h1>Nuevo Usuarios</h1>
        <div id="table">
        <form action="/gestpass/public/user" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table>
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Avatar</th>
   
                </thead>
                <tbody>
                
                    <tr>
                        <td><input type="text" name="name" placeholder="Introduzca el nombre"></td>
                        <td><input type="text" name="email" placeholder="Introduzca el email"></td>
                        <td><input type="text" name="password" placeholder="Introduzca la contraseña"><br>
                            <input type="text" name="password1" placeholder="Introduzca de nuevo la contraseña"></td>
                        <td><input type="text" name="avatar" placeholder="Introduzca el avatar"></td>
                       
                    </tr>
                    <tr>
                        <td  colspan="4"><input type="submit" value="Crear Usuario"/></td>
                    </tr>
                </tbody>
           
           
        </table>
        </form>
        </div>
        <div id="backtolist">
            <h5><a href="{{ route('user.index') }}">Volver al listado</a></h5>

        </div>
    </body> 
    
</html>

