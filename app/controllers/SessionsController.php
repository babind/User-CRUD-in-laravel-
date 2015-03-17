<?php

class SessionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /sessions
	 *
	 * @return Response
	 */
	public function index()
	{
		// 
		
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /sessions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		
		if(Auth::check()) return Redirect::route('users.show',['id'=>user()->id]);
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$rules=array(
			'email'=>'required|email',
			'password'=>'required'
		);
		$validator=Validator::make(Input::all(),$rules);
		if($validator->passes()){
			if(Auth::attempt(Input::only('email','password'))){
				$user=Auth::user();
				return Redirect::route('users.show',['id'=>$user->id]);

			}
			return Redirect::back()->withInput()->withMessage('Invalid username or Password');
			
			}
			else{
				return Redirect::back()->withInput()->withErrors($validator);	
			}
		
	}

	/**
	 * Display the specified resource.
	 * GET /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /sessions/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	public function logout()
	{
		Auth::logout();
		return Redirect::route('sessions.login')->with('message','You are now logged out');
	}

}