<!-- index.blade.php -->

@extends('layout.default')


@section('content')
<link rel="stylesheet" href="/css/bootstrap.css">

<div class="container">

{{HTML::ul($errors->all()	)}}

	{{Form::open(array('url'=>'users'))	}}

		<div class="form-group">
			{{Form::label('name','Name:')	}}
			{{Form::text('name',Input::old('name'),array('class'=>'form-control'))	}}
		</div>

		<div class="form-group">
			{{Form::label('email','Email:')}}
			{{Form::email('email',Input::old('email'),array('class'=>'form-control'))	}}
		</div>

		{{Form::submit('user Login!',array('class'=>'btn btn-primary'))	}}
		{{Form::close()	}}
		</div>