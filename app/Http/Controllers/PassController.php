<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Arr;

use App\Http\Requests;

use App\User;

use App\Pass;


class PassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $user = User::find($user_id)->passwords()->get();

        foreach ($user as $key) {
            $supplier[] = $key->supplier;
        }

        return $supplier;
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        if ($request->password == $request->password1){
            try{

                

                $pass = new Pass();

                $pass->supplier = $request->supplier;
                $pass->web = $request->web;
                $pass->user = $request->user;
                $pass->pass = $request->pass;
                $pass->user_id = $user_id;

                

                $pass->save();
                return ('contraseña guardada');
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
    public function show($user_id, $id)
    {
        $user = User::find($user_id)->passwords()->get();

        $pass = Pass::find($id);

        if ($pass->user_id == $user_id){

            return $pass;
        }else
            return 'Acceso denegado';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id, $id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($user_id, $id, Request $request)
    {
        $pass = Pass::find($id);

        if ($pass->user_id == $user_id){

            if($request->supplier != null){
                $pass->supplier = $request->supplier;
            }
            if($request->web != null){
                $pass->web = $request->web;
            }
            if($request->user != null){
                $pass->user = $request->user;
            }
            if($request->pass != null){
                $pass->pass = $request->pass;
            }
            var_dump($pass->supplier);
            var_dump($request->supplier);

            $pass->save();
            return 'Contraseña modificada';
            
        }else
            return 'Acceso denegado';
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $id)
    {
        $pass = Pass::find($id);

        if ($pass->user_id == $user_id){
            var_dump($pass->user_id);
            var_dump($user_id);

            $del = Pass::destroy($id);

            return 'Contraseña borrada';

        }else
            return 'Acceso denegado';
    }
}










