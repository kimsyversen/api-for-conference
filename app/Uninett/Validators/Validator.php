<?php namespace Uninett\Validation;

use Illuminate\Support\Facades\Validator as Validate;
abstract class Validator {

	protected $errors;

	public function getErrors()
	{
		return $this->errors;
	}

	public function isValid(array $attributes)
	{
		$validator = Validate::make($attributes, static::$rules);

		if($validator->fails())
		{
			$this->errors = $validator->messages();
			return false;
		}

		return true;
	}
}