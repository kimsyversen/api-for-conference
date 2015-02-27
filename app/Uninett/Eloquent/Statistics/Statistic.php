<?php namespace Uninett\Eloquent\Statistics;

use Eloquent;
use Laracasts\Commander\Events\EventGenerator;

class Statistic extends Eloquent {
	use EventGenerator;

	protected $table = 'statistics';

	protected $fillable = ['hits', 'statistic_uri_id'];

	public function uri()
	{
		return $this->belongsTo('StatisticUri');
	}

}