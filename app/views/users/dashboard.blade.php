@extends ('layout.default')
	@section('content')
	<h1>
	    Welcome {{$user->name}}
	</h1>
	<h4>
	   
	    {{ link_to_route('users.edit', 'Edit', array($user->id),
 array('class' => 'btn btn-info')) }}
	</h4>
	<h4>			
			{{HTML::linkRoute('users.getChangepassword','Change Password')}}
			<br>
			{{HTML::linkRoute('users.getChangeEmail','Change Email')}}
			<br>
		{{ Form::open(array(
   		         			'url' => 'users/' . $user->id,
            					'method' => 'DELETE',
            					'style' => 'display:inline' ))
    				}}				
					@include ('partials/_delete')
				{{ Form::close() }}  

			<br>
	    {{HTML::linkRoute('sessions.logout','Logout')}}
	</h4>
	@stop