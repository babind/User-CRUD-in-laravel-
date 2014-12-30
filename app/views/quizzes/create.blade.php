@extends('layout.default')

@section('content')
	<div class="col-md-8">

	{{Form::open(array('route'=>'quizzes.store','class'=>'form-horizontal'))	}}

	<div class="form-group">
	{{Form::label('title',' Quiz Title',array('class'=>'awesome'))	}}

	{{Form::text('title',null,array('class'=>'form-control'))	}}
	{{$errors->first('title')	}}
	</div>

	<div class="form-group">
	{{Form::label('description','Description',array('class'=>'awesome'))	}}
	{{Form::textarea('description',null,array('class'=>'form-control'))	}}
	{{$errors->first('description')	}}
	</div>

	<div class="form-group">
	{{Form::label('course','Select Course',array('class'=>'awesome'))	}}
	{{Form::select('course',array('a'=>'a','b'=>'b'),null,array('class'=>'form-control'))	}}
	{{$errors->first('email')	}}
	</div>
	<div class="form-group">
	{{Form::submit('Create Quiz',array('class'=>'btn btn-success btn-block'))	}}
	</div>
	{{Form::close()	}}
	</div>
@stop