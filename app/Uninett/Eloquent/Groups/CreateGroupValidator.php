<?php namespace Uninett\Eloquent\Groups;

use Uninett\Validators\FormValidator;

class CreateGroupValidator extends FormValidator{

    protected $rules = [
        'name' => 'required',
        'conference_id' => 'required'
    ];

}