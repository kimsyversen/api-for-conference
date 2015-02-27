<?php
use Laracasts\Commander\Events\EventGenerator;
use Uninett\Api\Events\NewRequest;

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