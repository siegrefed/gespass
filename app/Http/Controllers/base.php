<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use \Firebase\JWT\JWT;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class base extends Controller
{
	public $idToken = '';	

    protected function check()
    {
    	$request = apache_request_headers();
    	//var_dump($request['Authorization']);
        if(isset($request['Authorization']))
        {

	        if (!empty($request))
	        {
	        	//var_dump('hola');
	        	$jwt = $request["Authorization"];


	        	$key = 'danj71';
		        $decoded = JWT::decode($jwt, $key, array('HS256'));
		        $token = (array)$decoded;

		        $this->idToken = $token["id"];

		        
		       	//$entry = User::find('all', array('where' => array(array('email', $token["email"]),),));
		       	$entry = User::where('email', $token["email"])->get();



			    if (empty($entry))
			    {
		            return false;
		        }
		      	return true;
	  		}
	  		else return false;
		}
		else return false;
    }      
}
