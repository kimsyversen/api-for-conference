<?php namespace Uninett\Exceptions;

use Exception;

class UninettException extends Exception {

    /**
     * @var int
     */
    protected $errors;

    /**
     * @param string $message
     * @param int $errors
     * @param int $code
     * @param Exception $previous
     */
    function __construct($message, $errors, $code = 0, Exception $previous = null)
	{
		$this->errors = $errors;

        $this->message = $message;

		parent::__construct($message, $code, $previous);
	}

    /**
     * @return int
     */
    public function getErrors()
	{
		return $this->errors;
	}

}