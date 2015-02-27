<?php namespace Uninett\Eloquent\StatisticUris;
use Eloquent;
use Laracasts\Commander\Events\EventGenerator;

class StatisticUri extends Eloquent {

	use EventGenerator;

	protected $table = 'statistic_uris';

	protected $fillable = ['name'];

	//Disable only updated_at timestamp
	public function setUpdatedAtAttribute($value) {}
	public function getUpdatedAtColumn(){}

	public function statistics()
	{
		return $this->hasMany('Statistic');
	}
}