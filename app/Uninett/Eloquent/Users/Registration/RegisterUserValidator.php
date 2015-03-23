<?php namespace Uninett\Users\Registration;

use Uninett\Validators\FormValidator;

class RegisterUserValidator extends FormValidator {

    protected $rules = [
        'email' => [
            'required',
            'email',
            'unique:users,email,NULL,users,confirmed,1'],
        'password' => 'required|confirmed'
    ];

}