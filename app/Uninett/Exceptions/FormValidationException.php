<?php namespace Uninett\Exceptions;

use Exception;
use Illuminate\Http\Response as HttpResponse;

class FormValidationException extends UninettException {

    function __construct($message, $errors, $code = HttpResponse::HTTP_UNPROCESSABLE_ENTITY, Exception $previous = null)
    {
        parent::__construct($message, $errors, $code, $previous);
    }
}