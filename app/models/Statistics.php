<?php
use Laracasts\Commander\Events\EventGenerator;
use Uninett\Api\Events\NewRequest;

class Statistics  extends Eloquent {

	use EventGenerator;

	protected $table = 'statistics';

	protected $fillable = ['*'];

	public static function register($response)
	{
		$res = new static(compact('response'));

		$res->raise(new NewRequest($res));

		return $res;
	}

}