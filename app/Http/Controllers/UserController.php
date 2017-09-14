<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//use Request;

use App\User;

use Exception;

use \Firebase\JWT\JWT;

class UserController extends base
{
    private $key = 'danj71';

   
    private $path = 'user';

    public $tokenver = '';



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = User::all();

        //return $data;
        return view('index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->password == $request->password1){
            try{

                $user = new User();

                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = $request->password;
                $user->avatar = $request->avatar;

                $user->save();
                return redirect()->route('user.index');
            }
            catch(exception $e){
                echo $e->getMessage();
            }
        }else
            echo("ERROR Contraseñas no coinciden");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // var_dump($this->tokenver);
        // $head = apache_request_headers();
        // $head['Authorization'] = $this->tokenver;
        if($this->check()){
            //var_dump($this->idToken);

            if ($this->idToken == $id){

                $data = User::find($id);
                echo $this->tokenver;

                return $data;
            }else 
                return('acceso denegado');
        }else 
            return ('autentificacion fallida');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($this->check()){
            if($this->idToken == $id){
                $data = User::find($id);
                return view('edit', compact('data'));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($this->check()){

            if ($this->idToken == $id){

                $user = User::find($id);
                var_dump($request->name);
                var_dump($request->email);
                var_dump($request->header('key'));
                    
            
                if($request->name != null){

                    $user->name = $request->name;
                }
                if($request->email != null){
                    $user->email = $request->email;
                }
                if($request->password != null){
                    $user->password = $request->password;
                }
                if($request->avatar != null){
                    $user->avatar = $request->avatar;
                }
               
                $user->save();
                return redirect()->route('user.index');
            }
        }
        
    
            
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // try{

        //     $data = User::destroy($id);
        //     return('Usuario borrado');
        // }
        // catch(exception $e){
        //     return ('Usuario no encontrado');
        // }
        if ($this->check()){
            if ($this->idToken == $id){
                $data = User::find($id);

                if ($data){
                    $del = User::destroy($id);
                    return('Usuario borrado');
                }else{
                    return('Usuario no encontrado');
                }
            }
        }



    }

    public function login (Request $request)
    {
        $tokentohead = apache_request_headers();

        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->get();
        //var_dump($user);
        
        
        if(isset ($email)){

            if (isset($password)){

                if(!empty($user)){

                    foreach ($user as $key => $value)
                    {
                        $id = $user[$key]->id;
                        $email1 = $user[$key]->email;
                        $pass = $user[$key]->password;
                        // var_dump($id);
                        //exit;
                    }
                    // var_dump($id);


                }else
                    return ('Usuario no encontrado');

                

                if ($email == $email1 && $password == $pass){

                    $token = array(
                        "id" => $id, 
                        "email" => $email1, 
                        "password" => $pass
                    );
                    
                    $jwt = JWT::encode($token, $this->key);

                    $tokentohead['Authorization'] = $jwt;
                    $this->tokenver = $jwt;
                    var_dump($this->tokenver);


                    // return $this->notice($code = 'SUCCESSFUL ACTION', $message = $jwt);
                    return array('code' => 200, 'token' => $jwt, 'id' => $id);
                }else
                    return('Contraseña erronea');

            }else 
                return('Falta rellenar contraseña');

        }else
            return('Falta rellenar email');
        
    }
}
