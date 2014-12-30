<?php
class UsersController extends \BaseController {
	function __construct(User $user) {
		$this->user = $user;
	}
	public function index()
	{
	}
	public function create()
	{
			if (Auth::check()) return Redirect::route('users.show',['id' => Auth::user()->id]);
			return View::make('users.create');
	}
	public function store()
	{
		$rules = array(
			'name'  	 => 'required',
			'email'  	 => 'required|email|unique:users',	
			'password' => 'required|min:6|confirmed',
			'password_confirmation'=> 'required|min:6'
		);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->passes()){	
			$user = new User;
			$user->name = Input::get('name');
		  $user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->save();
			return Redirect::route('sessions.login')->with('message', 'Thanks for registering!');
		}
		else{
			return Redirect::back()->withInput()->withErrors($validator);
		}
	}
	public function show($id)
	{
		if (Auth::guest()) return Redirect::route('sessions.login');
		$user = $this->user->find($id);
		return View::make('users.dashboard',['user' => $user]);		
	}
	public function edit($id)
	{
		if (Auth::user()->id != $id) {
       	return Redirect::route('users.edit',['id' => Auth::user()->id]);
    } else {
       	$user = $this->user->find($id);
				return View::make('users.edit',['user'=>$user]);
    }
	}
	public function update($id)
	{
		$rules = array(
			'name'  	 => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->passes()){	
			$user = $this->user->find($id);
			$user->name = Input::get('name');
			$user->street_address = Input::get('street_address');
			$user->state = Input::get('state');
			$user->city = Input::get('city');
			$user->zip_code = Input::get('zip_code');
			$user->country = Input::get('country');
			$user->mobile_phone = Input::get('mobile_phone');
			$user->save();
			return Redirect::route('users.show', ['id' => $id])
																->with('message', 'Successfully Updated');
		}
		else{
			return Redirect::back()->withInput()
														 ->withErrors($validator);
		}
	}
	public function destroy($id)
	{
			$user = $this->user->find($id);
			$user->delete();
		Session::flash('message', 'Successfully closed the account!');
		return Redirect::route('sessions.login');
	}
	public function getChangeEmail()
	{
		return View::make('users.changeemail');
	}
	public function changeEmail($id)
	{
		$rules = array('email' => 'required|email|unique:users');
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->passes()) {
			$user = $this->user->find($id);
			$user->email = Input::get('email');
			$user->save();
			return Redirect::route('users.getChangeEmail')
												->with('message' , 'Email Successfully Changed') ;
		}
			return Redirect::back()->withErrors($validator)->withInput();
	}
	public function getChangepassword()
	{
		return View::make('users.changepassword');
	}
	public function changepassword($id)
	{
		$rules = array(
			'old-password'  => 'required|min:6',
			'new_password'  => 'required|min:6|confirmed',
			'password_confirmation' => 'required|min:6'
		);
		$user = $this->user->find($id);
		$oldPassword = Auth::user()->password;
		$oldPassword1 =Input::get('old-password');
		$newPassword = Input::get('password');
		$validator = Validator::make(Input::all(), $rules);
    if($validator->fails()){	
    	if (! Hash::check($oldPassword1, $oldPassword)){
				return Redirect::route('users.getChangepassword')
														->with('message','Old Password did not match');
			}else	{
			 	$user->password =  Hash::make($newPassword);
				$user->save();
			return Redirect::route('users.getChangepassword')
														->with('message','Password Successfully Changed');
			}	
		}
		else{
				return Redirect::back()->withErrors($validator);
		}
	}
}
