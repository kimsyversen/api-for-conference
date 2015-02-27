<?php namespace Uninett\Eloquent\Statistics;

use Eloquent;
use Laracasts\Commander\Events\EventGenerator;
use Request;
use Uninett\Api\Requests\LogRequestCommand;


class Statistic extends Eloquent {
	use EventGenerator;

	protected $table = 'statistics';

	protected $fillable = ['hits', 'statistic_uri_id'];

	//Disable only updated_at timestamp
	public function setUpdatedAtAttribute($value) {}
	public function getUpdatedAtColumn(){}

	public function uri()
	{
		return $this->belongsTo('StatisticUri');
	}

}