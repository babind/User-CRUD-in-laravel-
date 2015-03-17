@extends('layout.default')
@section('content')
	<h1 class=""> Display all Quizzes</h1>
		@if(count($quiz)==0)
		<li class="">Sorry,records not found</li>
		<caption>
		{{link_to_route('quizzes.create','Add New Quiz')}}
		</caption>
		@else
		<table class="table table-bordered table-condensed">
		<!-- <caption>
		{{link_to_route('quizzes.create','Add New Quiz')}}
		</caption> -->
		<thead>
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th>Course</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		@foreach($quiz as $quiz)
			<tr>
				<td>{{$quiz->title}}</td>
				<td>{{$quiz->description}}</td>
				<td>{{$quiz->course_id}}</td>
				<td>{{link_to_route('quizzes.edit','Edit',array($quiz->id))	}}</td>
				<td>
					{{Form::open(array(
					'url'=>'quizzzes/'.$quid->id,
					'method'=>'DELETE',
					'style'=>'display:inline'))
					}}
					@include('partials/_delete')
					{{Form::close()	}}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endif

@stop

