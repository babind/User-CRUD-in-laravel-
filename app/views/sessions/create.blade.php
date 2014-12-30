@extends('layout.default')
@section('content')
    <div class="col-md-8">
    {{ Form::open(array('route' => 'sessions.store', 'class' => 'form-horizontal'))}}
    <div class="form-group">
        {{Form::label('email', 'Email', array('class' => 'awesome'));}}
        {{Form::email('email','',array('class' => 'form-control'))}}
        {{$errors->first('email')}}
    </div>
    <div class="form-group">
        {{Form::label('password', 'Password', array('class' => 'awesome'));}}
        {{Form::password('password',array('class' => 'form-control'))}}
        {{$errors->first('password')}}
    </div>
    <div class="form-group">
        {{Form::submit('Login',array('class' => 'btn btn-success btn-block'))}}
    </div>
    {{ Form::close() }}
     <h4>{{HTML::linkRoute('users.register','Register')}}</h4>
     </div>
@stop