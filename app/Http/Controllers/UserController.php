<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Exception;

class UserController extends Controller
{

    private $path = 'user';
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
        $data = User::find($id);

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('edit', compact('data'));
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
        $user = User::find($id);
        var_dump($request->name);
        var_dump($request->email);
            
    
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

        $data = User::find($id);

        if ($data){
            $del = User::destroy($id);
            return('Usuario borrado');
        }else{
            return('Usuario no encontrado');
        }



    }

    public function login (Request $request)
    {
        return ("login hecho");
    }
}
