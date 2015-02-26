<?php namespace Uninett\Exceptions;
use Exception;

class ValidationException extends UninettException {

	function __construct($message, $errors, $code, Exception $previous = null)
	{
		parent::__construct($message, $errors, $code, $previous);
	}
}