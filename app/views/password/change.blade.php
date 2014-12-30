@extends('layout.default')
@section('content')

<div class="row">
	<div class="col-md-5">
		{{Form::open()}}

		<div class="form-group">
		{{Form::label('email','Email:',array('class'=>'form-awesome'))}}
		{{Form::text('email',array('class'=>form-control))}}
		</div>

		<div class="form-group">
		{{Form::label('password','old password',array('class'=>'form-awesome'))}}
		{{Form::text('password',array('class'=>'form-control'))}}
		</div>

		<div class="form-group">
		{{Form::label('new_password','Your Password',array('class'=>'form-awesome'))}}
		{{Form::text('new_password',array('class'=>'form-control'))}}
		</div>

		<div class="form-group">
		{{Form::label('changed_password','change password',array('class'=>'form-awesome'))}}
		{{Form::text('changed_password',array('class'=>'form-control'))}}
		</div>

		{{Form::submit('change it',array('class'=>'btn btn-success'))}}

		{{Form::close()}}
	</div>
</div>