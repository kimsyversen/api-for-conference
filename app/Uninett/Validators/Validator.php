<?php namespace Uninett\Validation;


use Illuminate\Support\Facades\Validator as Validate;
use Uninett\Exceptions\ValidationException;
use Illuminate\Http\Response as HttpResponse;
abstract class Validator {

	protected $errors;

	public function getErrors()
	{
		return $this->errors;
	}

	public function isValid(array $attributes)
	{
		$validator = Validate::make($attributes, static::$rules);

		if($validator->fails()) {
			$this->errors = $validator->messages();

			throw new ValidationException('One or more of these fields already exists', $this->errors, HttpResponse::HTTP_UNPROCESSABLE_ENTITY);
		}
		return true;
	}
}