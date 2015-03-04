<?php namespace Uninett\Validators;

/**
 * This code is a modification of the validation package
 * authored by Jeffery Way. Source:
 * https://github.com/laracasts/Validation
 */
interface ValidatorInterface {

	/**
	 * Determine if the validation failed
	 *
	 * @return mixed
	 */
	public function fails();

	/**
	 * Get the list of validation errors
	 *
	 * @return mixed
	 */
	public function errors();

} 