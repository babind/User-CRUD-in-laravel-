@extends('layout.default')

@section('content')
<head>
		<title>Look! I'm creating User</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	</head>
	<body>
	<div class="container">

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{URL::to('users')	}}"> User Alert</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="{{URL::to('users')}}">View All Users</a></li>
			<li><a href="{{URL::to('users/create')	}}">Create A User</a></li>
		</ul>
		</nav>


	<!-- if there are creation errors ,they will show here -->
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

		{{Form::submit('Create the User!',array('class'=>'btn btn-primary'))	}}
		{{Form::close()	}}
		</div>
	</body>
</html>


