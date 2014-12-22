<!-- /var/www/html/ideasoffshore-projects/laraseries/app/views/users/edit.blade.php -->

@extends('layout.default')

@section('content')
	<head>
		<title> I am editing a user</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	</head>
	<body>
	<div class="container">

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('users') }}">User Alert</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="{{ URL::to('users') }}">View All Users</a></li>
			<li><a href="{{ URL::to('users/create') }}">Create a User</a></li>
		</ul>
	</nav>

	<h1> Edit{{$user->name}}</h1>

	<!-- if there are creation errors, they will show here  -->

	{{HTML::ul($errors->all()	)}}
	{{Form::model($user,array('action'=>array('UsersController@update',$user->id),'method'=>'PUT'))}}

	<div class="form-group">
		{{Form::label('name','Name:')	}}
		{{Form::text('name',null,array('class'=>'form-control'))	}}
	</div>

	<div class="form-group">
		{{Form::label('email','Email:')	}}
		{{Form::email('email',null,array('class'=>'form-control'))	}}
	</div>

	{{Form::submit('Edit the User!',array('class'=>'btn btn-primary'))	}}

	{{Form::close()	}}

	</div>
	</body>
	</html>
