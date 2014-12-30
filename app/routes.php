<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function()
{
	if(Auth::check()){
		return Redirect::route('users.show',['id'=>Auth::user()->id]);
	}
	return View::make('hello');
});
//routes for User Controllers

Route::resource('users','UsersController');
Route::get('register',array('as'=>'users.register','uses'=>'UsersController@create'));
Route::get('getChangepassword',array('as'=>'users.getChangepassword','uses'=>'UsersController@getChangepassword'));
Route::post('changepassword/{id}',array('as'=>'users.changepassword','uses'=>'UsersController@changepassword'));
Route::get('getChangeEmail',array('as'=>'users.getChangeEmail','uses'=>'UsersController@getChangeEmail'));
Route::post('changeEmail/{id}',array('as'=>'users.changeEmail','uses'=>'UsersController@changeEmail'));


//Routes for Sessions Controller
Route::get('login',array('as'=>'sessions.login','uses'=>'SessionsController@create'));
Route::resource('sessions','SessionsController');
Route::get('logout',array('as'=>'sessions.logout','uses'=>'SessionsController@logout'));

//Routes for quizzes
Route::resource('quizzes','QuizzesController');