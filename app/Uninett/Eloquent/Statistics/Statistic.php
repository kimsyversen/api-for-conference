<?php namespace Uninett\Eloquent\Statistics;

use Eloquent;

class Statistic extends Eloquent {
	protected $table = 'statistics';

	protected $fillable = ['hits', 'statistic_uri_id'];

	public function uri()
	{
		return $this->belongsTo('StatisticUri');
	}
}