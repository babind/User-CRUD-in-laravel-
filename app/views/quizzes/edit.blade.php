@extends('layout.default')

@section('content')
	<div class="col-md-9">

	{{Form::model($quiz, array('route'=> array('quizzes.update', $quiz->id), 'method'=>'PUT', 'class'=>'form-horizontal'))	}}

	<div class="form-group">
	{{Form::label('title','Quiz Title',array('class'=>'awesome'))	}}
	{{Form::text('title',Input::old('title'), array('class'=>'form-control'))	}}
	{{$errors->first('title')	}}
	</div>

	<div class="form-group">
	{{Form::label('description','Description',array('class'=>'awesome'))	}}
	{{Form::textarea('description',Input::old('description'),array('class'=>'form-control'))	}}
	{{$errors->first('description')	}}
	</div>

	<div class="form-group">
	{{Form::label('course','Select Course',array('class'=>'awesome'))	}}
	{{Form::select('course',array('a'=>'a','b'=>'b'),null,array('class'=>'form-control'))	}}
	</div>

	<div class="form-control">
	{{Form::submit('Update Quiz',array('class'=>'btn btn-success btn-block'))	}}
	</div>

	{{Form::close()	}}
	</div>
@stop
