<?php

use Laracasts\Commander\CommanderTrait;
use Uninett\Api\Responders\Responder;

class ApiController extends \BaseController {

    use CommanderTrait;

	protected $responder;

    /**
     * @param Responder $responder
     */
    function __construct(Responder $responder)
	{
		$this->responder = $responder;
	}

	/**
	 * @return string
	 */
	protected function getUserId()
	{
		return Authorizer::getResourceOwnerId();
	}
}