<?php

use Uninett\Api\Responders\Responder;
use Illuminate\Http\Response as HttpResponse;

/**
 * Return ModelNotFoundException if a client requests a particular instance of a model, but it is not found
 */
App::error(function(\Illuminate\Database\Eloquent\ModelNotFoundException $exception, $code)
{
	return (new Responder)->setStatusCode(HttpResponse::HTTP_NOT_FOUND)
                          ->respondWithError('model_not_found', 'Resource not found');
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



