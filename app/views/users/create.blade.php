@extends('layout.default')
    @section('content')
        {{ Form::open(array('route' => 'users.store', 'class' => 'form-horizontal'))}}

        <div class="form-group">
            {{Form::label('name', 'Name', array('class' => 'awesome'));}}
            {{Form::text('name','',array('class' => 'form-control'))}}
            {{$errors->first('name')}}
        </div>

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
            {{Form::label('password', 'Retype Password', array('class' => 'awesome'));}}
            {{Form::password('password_confirmation',array('class' => 'form-control'))}}
            {{$errors->first('password_confirmation')}}
        </div>
        <div class="form-group">
            {{Form::submit('Create Account',array('class' => 'btn btn-success btn-block'))}}
        </div>
        {{ Form::close() }}
         <h4>{{HTML::linkRoute('sessions.login','I already have an Account')}}</h4>

    @stop