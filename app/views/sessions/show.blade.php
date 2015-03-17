<!-- show.blade.php -->

@extends('layout.default')

@section('content')

@foreach($users as $user)
 hello {{ $user->name}}
@endforeach
@stop