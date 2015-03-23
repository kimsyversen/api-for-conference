<?php namespace Uninett\Users\Registration;

class RegisterUserCommand {

	public $email;

	public $password;

    public $password_confirmation;

	public $confirmation_code;

	function __construct($email, $password, $password_confirmation)
	{
		$this->email = $email;
		$this->password = $password;
        $this->password_confirmation = $password_confirmation;
        $this->confirmation_code = str_random(40);
	}
} 