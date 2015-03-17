<?php

class QuizzesController extends \BaseController {

	public function __construct(Quiz $quiz )
	{
		$this->quiz=$quiz;
	}
	public function index()
	{
		$quiz=$this->quiz->all();
		return View::make('quizzes.show',['quiz'=>$quiz]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /quizzes/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('quizzes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /quizzes
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$input=Input::all();
		if(!$this->quiz->fill($input)->isValid($input))
		{
			return Redirect::back()->withInput()->withErrors($his->quiz->errors);

		}
		$quiz= new Quiz;
		$quiz->title=Input::get('title');
		$quiz->description=Input::get('description');
		$quiz->course_id=1;
		$quiz->user_id=Auth::id();
		$quiz->save();
		$insertedId=$quiz->id;
		return View::make('questions.create',['id'=>$insertedId]);
	}

	/**
	 * Display the specified resource.
	 * GET /quizzes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /quizzes/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		

		$quiz=$this->quiz->find($id);
		return View::make('quizzes.edit',['quiz'=>$quiz]);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /quizzes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input=Input::all();
		if(!$this->quiz->fill($input)->isValid($input))
		{
			return Redirect::back()->withInput()->withErrors($this->quiz->errors);

		}
		$quiz=$this->quiz->find($id);
		$quiz->title=Input::get('title');
		$quiz->description=Input::get('description');
		$quiz->course_id=1;
		$quiz->save();
		return Redirect::route('quizzes.index',['message','Quiz Successfully Updated']);

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /quizzes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$quiz=$this->quiz->find($id);
		$quiz->delete();
		Session::flash('message','Quiz Successfully Deleted');
		return Redirect::route('quizzes.index');
	}

}