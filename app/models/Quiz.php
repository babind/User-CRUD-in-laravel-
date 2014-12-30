<?php

class Quiz extends \Eloquent{
	protected $fillable=['title','description'];

	public $rules=[
	'title'=>'required',
	'description'=>'required'
	];

	protected $table='quizzes';

	public function isValid()
	{
		$validator=Validator::make($this->attributes,$this->rules);

		if($validator->passes()){
			return true;

		}
		$this->errors=$validator->message();
		return false;
	}
}