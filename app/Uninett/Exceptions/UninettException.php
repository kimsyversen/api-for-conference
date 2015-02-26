<?php namespace Uninett\Exceptions;
use Exception;

class UninettException extends Exception {

	protected $errors;

	protected $message;

	function __construct($message, $errors, $code = 0, Exception $previous = null)
	{
		$this->message = $message;

		$this->errors = $errors;

		parent::__construct($message, $code, $previous);
	}

	public function getErrors()
	{
		return $this->errors;
	}

}