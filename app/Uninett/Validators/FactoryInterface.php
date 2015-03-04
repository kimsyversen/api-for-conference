<?php namespace Uninett\Validators;

/**
 * This code is a modification of the validation package
 * authored by Jeffery Way. Source:
 * https://github.com/laracasts/Validation
 */
interface FactoryInterface {

	/**
	 * Initialize validator
	 *
	 * @param array $formData
	 * @param array $rules
	 * @param array $messages
	 * @return ValidatorInterface
	 */
	public function make(array $formData, array $rules, array $messages = []);

} 
