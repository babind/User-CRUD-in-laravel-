<!-- changepassword.blade.php -->

@extends('layout.default')
@section('content')
	<?php $user=Auth::user() ?>
	{{Form::model($user,array('route'=>array('users.changepassword',$user->id),'method'=>'POST','class'=>'form-horizontal'))	}}

	<div class="form-group">
		{{Form::label('old-password','Old-Password',array('class'=>'awesome'))	}}
		{{Form::password('old-password',array('class'=>'form-control'))	}}
		{{$errors->first('old-password')	}}

	</div>

	<div class="form-group">
		{{Form::label('new_passwword','New-Password',array('class'=>'awesome'))	}}
		{{Form::password('new_password',array('class'=>'form-control'))	}}
		{{$errors->first('new_password')	}}
	</div>

	<div class="form-group">
		{{Form::label('password_confirmation','Retype Your Password',array('class'=>'awesome'))	}}
		{{Form::password('password_confirmation',array('class'=>'form-control'))	}}
		{{$errors->first('password_confirmation')	}}
	</div>

	<div class="form-group">
		{{Form::submit('Change Password',array('class'=>'btn btn-success btn-block'))	}}
	</div>
	{{Form::close()}}
@stop	
