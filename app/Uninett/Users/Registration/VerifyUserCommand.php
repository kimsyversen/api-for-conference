<?php namespace Uninett\Users\Registration;

class VerifyUserCommand {
	public $confirmation_code;

	function __construct($confirmation_code)
	{
		$this->confirmation_code = $confirmation_code;
	}
} 