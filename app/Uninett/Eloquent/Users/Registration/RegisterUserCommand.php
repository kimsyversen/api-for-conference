<?php namespace Uninett\Users\Registration;

class RegisterUserCommand {
	public $username;
	public $email;
	public $password;
	public $confirmation_code;

	function __construct($username, $email, $password)
	{
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;

	}
} 