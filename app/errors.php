<?php

use Uninett\Api\Responders\Responder;

/**
 * Return ModelNotFoundException if a client requests a particular instance of a model, but it is not found
 */
App::error(function(\Illuminate\Database\Eloquent\ModelNotFoundException $exception, $code)
{
	return (new Responder)->setStatusCode($exception->getCode())
                          ->respondWithError('model_not_found', $exception->getMessage(), $exception->getErrors());
});

/**
 * Return an application wide validation exception
 */
App::error(function(\Uninett\Exceptions\FormValidationException $exception, $code)
{
    return (new Responder)->setStatusCode($exception->getCode())
                          ->respondWithError('validation_failed', $exception->getMessage(), $exception->getErrors());
});

App::error(function(\Uninett\Exceptions\VerifyUserException $exception, $code)
{
    return (new Responder)->setStatusCode($exception->getCode())
                          ->respondWithError('verification_failed', $exception->getMessage(), $exception->getErrors());
});

