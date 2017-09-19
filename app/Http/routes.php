<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function() {
    return view('login');
});

Route::post('logdone', 'UserController@login');

Route::get('signup', function() {
    return view ('create');
});

Route::resource('user', 'UserController');

//Route::resource('password', 'PassController');
Route::get('user/{id}/pass', 'PassController@index')->name('pass.index');

Route::post('user/{user_id}/pass', 'PassController@store')->name('pass.store');

Route::get('user/{user_id}/pass/{id}', 'PassController@show')->name('pass.show');

Route::put('user/{user_id}/pass/{id}', 'PassController@update')->name('pass.update');

Route::delete('user/{user_id}/pass/{id}', 'PassController@destroy')->name('pass.destroy');

Route::resource('class', 'ClassController');





//Route::get('users', 'UserController@index');