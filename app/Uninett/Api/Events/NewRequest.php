<?php namespace Uninett\Api\Events;

use Log;
use Uninett\Eloquent\Statistics\Statistic;

class NewRequest {

	public $request;

	//TODO: Her skjer, eller skal skje et eller annet
	function __construct(Statistic $request)
	{
		$this->request = $request;

		Log::info('NewRequest event fungerte');
	}

}