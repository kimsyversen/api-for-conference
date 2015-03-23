<?php namespace Uninett\Users\Registration;

use Uninett\Validators\FormValidator;

class VerifyUserValidator extends FormValidator {

    protected $rules = [
        'confirmation_code' => 'required|size:40'
    ];

} 