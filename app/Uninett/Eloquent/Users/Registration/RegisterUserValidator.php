<?php namespace Uninett\Users\Registration;

use Uninett\Validators\FormValidator;

class RegisterUserValidator extends FormValidator{

    protected $rules = [
        'username' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed'
    ];

}