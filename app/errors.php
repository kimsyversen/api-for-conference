<?php
//TODO: Format error messages to something more fitting

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
		'error' => $exception->getMessage()
	];

	return Response::json($data, $exception->getCode());
});

App::error(function(\Uninett\Exceptions\ValidationException $exception, $code)
{

	$data = [
		'error' => $exception->getMessage()
	];

	return Response::json($data, $exception->getCode());
});



App::error(function(\Uninett\Exceptions\VerifyUserException $exception, $code)
{
	$data = [
		'error' => $exception->getMessage()
	];

	return Response::json($data, $exception->getCode());
});