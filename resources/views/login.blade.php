<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('estilos.css') }}">
        
    </head>    
    <body>
        <h1>Login</h1>
        <div id="table">
        <form action="/gestpass/public/logdone" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table>
                <thead>
                    
                    <th>Email</th>
                    <th>Password</th>
                    
   
                </thead>
                <tbody>
                
                    <tr>

                        <td><input type="text" name="email" placeholder="Introduzca el email"></td>
                        <td><input type="text" name="password" placeholder="Introduzca la contraseña"></td>
                        
                       
                    </tr>
                    <tr>
                        <td  colspan="2"><input type="submit" value="Entrar"/></td>
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