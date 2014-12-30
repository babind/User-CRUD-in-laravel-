<!-- changeemail.blade.php -->
@extends('layout.default')

@section('content')
	<?php $user=Auth::user()	?>

	{{$user->email}}

	{{Form::model($user,array('route'=>array('users.changeEmail',$user->id),'method'=>'POST' ,'class'=>'form-horizontal'))	}}

	<div class="form-group">
			{{Form::label('email','Email:',array('class'=>'awesome'))	}}
			{{Form::email('email','',array('class'=>'form-control'))	}}
			{{$errors->first('email')}}
		</div>

		<div class="form-group">
			{{Form::submit('Change Email',array('class'=>'btn btn-success btn-block'))	}}
		</div>
		{{Form::close()}}
@stop