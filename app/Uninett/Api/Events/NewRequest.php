<?php namespace Uninett\Api\Events;
use Statistic;
use Log;
class NewRequest {

	public $request;

	function __construct(Statistic $request)
	{
		$this->request = $request;

		Log::info('NewRequest event fungerte');
	}

}