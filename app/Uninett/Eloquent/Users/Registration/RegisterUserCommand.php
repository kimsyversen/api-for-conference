<?php namespace Uninett\Users\Registration;

class RegisterUserCommand {

	public $username;
	public $email;
	public $password;
    public $password_confirmation;
	public $confirmation_code;

	function __construct($username, $email, $password, $password_confirmation)
	{
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
        $this->password_confirmation = $password_confirmation;

	}
} 