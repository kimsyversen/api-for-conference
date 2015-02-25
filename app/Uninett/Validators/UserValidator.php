<?php namespace Uninett\Validation;

class UserValidator extends Validator {

	public static $rules = [
		'username' => 'required|unique:users',
		'email' => 'required|email|unique:users',
		'password' => 'required|confirmed'
	];
}