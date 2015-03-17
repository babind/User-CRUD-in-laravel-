@extends('layout.default')

@section('content')
	<h1>Welcome to Chaseuni app</h1>


	{{HTML::linkRoute('sessions.login','Login')}}
	{{HTML::linkRoute('users.register','Register')}}

@stop