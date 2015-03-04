<?php

use Uninett\Api\Formatters\OutputFormatter;

/**
 * Return ModelNotFoundException if a client requests a particular instance of a model, but it is not found
 */
App::error(function(\Illuminate\Database\Eloquent\ModelNotFoundException $exception, $code)
{
	return (new OutputFormatter)->errors('model_not_found', $exception->getMessage(), $exception->getCode(), $exception->getErrors());
});

/**
 * Return an application wide validation exception
 */
App::error(function(\Uninett\Exceptions\FormValidationException $exception, $code)
{
	return (new OutputFormatter)->errors('validation_failed', $exception->getMessage(), $exception->getCode(), $exception->getErrors());
});

App::error(function(\Uninett\Exceptions\VerifyUserException $exception, $code)
{
	return (new OutputFormatter)->errors('verification_failed', $exception->getMessage(), $exception->getCode(), $exception->getErrors());
});

