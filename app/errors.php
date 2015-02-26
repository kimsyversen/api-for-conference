<?php

/**
 * PROS: easy
 * CONS: does not comply to content negotiation. A client requesting XML would get json back if error happens
 */

/**
 * Return ModelNotFoundException if a client requests a particular instance of a model, but it is not found
 */
App::error(function(\Illuminate\Database\Eloquent\ModelNotFoundException $exception, $code)
{
	$data = [
		'error' => 'validation_failed',
		'error_description' => $exception->getMessage(),
		'errors' => $exception->getErrors(),
	];


	return Response::json($data, $exception->getCode());
});

App::error(function(\Uninett\Exceptions\ValidationException $exception, $code)
{
	$data = [
		'error' => 'validation_failed',
		'error_description' => $exception->getMessage(),
		'errors' => $exception->getErrors(),
	];

	return Response::json($data, $exception->getCode());
});



App::error(function(\Uninett\Exceptions\VerifyUserException $exception, $code)
{
	$data = [
		'error' => 'validation_failed',
		'error_description' => $exception->getMessage(),
		'errors' => $exception->getErrors(),
	];

	//Content negotiation
	if(Request::header('accept') === 'application/json')
		return Response::json($data, $exception->getCode());


	return Response::json($data, $exception->getCode());
});