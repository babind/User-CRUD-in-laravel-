<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		/* get all the users*/
		$users=User::all();

		// load the view and pass the users

		return View::make('users.index')->with('users',$users);
	}
	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/users/create.blade.php)
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		//validate 

		$rules=array(
			'name'=>'required',
			'email'=>'required|email',
			);
		$validator=Validator::make(Input::all(),$rules);
	// process the login
	
	if($validator->fails()){
		return Redirect::to('users/create')->withErrors($validator)->withInput(Input::except('password'));

		}else{
			//store 
			$user=new User;
			$user->name= Input::get('name');
			$user->email=Input::get('email');
			$user->save();

			//redirect 

			Session::flash('message','Successsfully created  user!');
			return Redirect::to('users');
		}	
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//get the user
		 $user=User::find($id);

		 //show the view and pass the user to it
		 return View::make('users.show')->with('user',$user);

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the nerd
		$user=User::find($id);

		// show edit form and pass the user

		return View::make('users.edit')->with('user',$user);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//validate

		$rules=array(
			'name'=>'required',
			'email'=>'required|email'
	);
	$validator=Validator::make(Input::all(),$rules);
	// process the login
	if($validator->fails()){
		return Redirect::to('users/'.$id.'/edit')
		->withErrors($validator)
		->withInput(Input::except('password'));
	}else{
		//store
		$user=User::find($id);
		$user->name=Input::get('name');
		$user->email=Input::get('email');
		$user->save();

		//redirect 
		Session::flash('message','Successfully updated user!' );
		return Redirect::to('users');

		}	
	
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//delete
		$user=User::find($id);
		$user->delete();
		//
		Session::flash('message','User deleted');
		return Redirect::to('users');
	}

}