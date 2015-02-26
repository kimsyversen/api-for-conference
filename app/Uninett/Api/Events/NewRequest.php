<?php namespace Uninett\Api\Events;
use Statistics;
use Log;
class NewRequest {

	public $response;

	function __construct(Statistics $request)
	{
		$this->response = $request;

		Log::info('NewRequest event fungerte');
	}

}