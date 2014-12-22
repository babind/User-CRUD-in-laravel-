@extends('layout.default')

@section('content')

	<head>
		<title>Create A User</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	</head>
	<body>
	<div class="container">

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{URL::to('users')}}">User alert</a>
		</div>
		<ul class="navbar navbar-nav">
			<li><a href="{{URL::to('users')}}">View All Users</a></li>
			<li><a href="{{URL::to('users/create')}}">One User is Added</a></li>
		</ul>
		</nav>

		<h1> All The users</h1>
		 <!-- will be used to show any messages -->
		 @if(Session::has('message'))
		 	<div class="alert alert-danger">{{Session::get('message') }}</div>
		 @endif
		 <div class="col-md-10">
		 <table class="table table-striped table-bordered">
		 	<thead>
		 		<tr>
		 			<td>ID</td>
		 			<td>Name</td>
		 			<td>Email</td>
		 		</tr>
		 	</thead>
		 	<tbody>
		 	@foreach($users as $key=>$value)
		 		<tr>
			 		<td>{{ $value->id}}</td>
			 		<td>{{$value->name}}</td>
			 		<td>{{$value->email}}</td>
			 	
					 <!-- we will also add show,edit,and delete buttons -->
					 <td>

					 <!-- delete the user(uses the destroy method DESTROY /users/{id} -->
						<!-- we will add this later since its a little more complicated than the first two buttons -->
					 {{Form::open(array('url'=>'users/' . $value->id, 'class'=>'pull-right'))	}}
					 {{Form::hidden('_method','DELETE')	}}
					 {{Form::submit('Delete User',array('class'=>'btn btn-warning'))	}}
					 {{Form::close()}}

					  <!-- show the user (uses the method found at GET/users/{id}) -->
					  <a class="btn btn-small btn-success" href="{{URL::to('users/'.$value->id)}}">Show this User</a>

					  <!-- edit this user('uses the edit method found at GET/users/{id}/edit) -->
					  <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit') }}">Edit this User</a>

				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>

	</div>
</body>
</html>

