<?php namespace Uninett\Validators;

use Illuminate\Validation\Factory as Validator;

/**
 * This code is a modification of the validation package
 * authored by Jeffery Way. Source:
 * https://github.com/laracasts/Validation
 */
class LaravelValidator implements FactoryInterface {

	/**
	 * @var \Illuminate\Validation\Factory
	 */
	private $validator;

	/**
	 * @param Validator $validator
	 */
	function __construct(Validator $validator)
	{
		$this->validator = $validator;
	}

	/**
	 * Initialize validation
	 *
	 * @param array $formData
	 * @param array $rules
	 * @param array $messages
	 * @return \Illuminate\Validation\Validator
	 */
	public function make(array $formData, array $rules, array $messages = [])
	{
		return $this->validator->make($formData, $rules, $messages);
	}

}
