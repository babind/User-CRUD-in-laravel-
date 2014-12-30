<?php

class QuestionsController extends \BaseController {

	public function __construct(Question $question){

		$this->question=$question;

	}

	public function index()
	{
		return'questions';

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /questions/create
	 *
	 * @return Response
	 */
	public function create($quiz_id)

	{
		return View::make('questions.create',['quiz_id'=>$quiz_id]);	
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /questions
	 *
	 * @return Response
	 */
	public function store()
	{
		$quiz_id=Input::get('quiz_id');
		$question=Input::get('question');
		$rules=array(
			'name'=>'required'
		);
		foreach($question as $row){

			$question=new Question;
			$question->name=$row['name'];
			$question->quiz_id=$quiz_id;
			$question->save();
			$questionId=$question->id;
			foreach($row['options'] as $optionName){

			$option=new Option;
			$option->name=$otionName['name'];
			$option->question_id=$questionId;
			$option->is_correct=array_key_exists("is_correct",$optionName)?true:false;
			$option->save();

			}


		}
		return Redirect::route('quizzes,index')->with('message','Quiz successfully created');
	}

	/**
	 * Display the specified resource.
	 * GET /questions/{id}
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
	 * GET /questions/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /questions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /questions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}