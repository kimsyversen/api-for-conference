<?php namespace Uninett\Users\Registration;

use Uninett\Validators\FormValidator;

class RegisterUserValidator extends FormValidator {

    protected $rules = [
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed'
    ];

}