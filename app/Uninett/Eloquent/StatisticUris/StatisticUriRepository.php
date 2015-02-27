<?php namespace Uninett\Eloquent\StatisticUris; 
class StatisticUriRepository {

	public function find($uri) {
		return StatisticUri::where('name', '=', $uri)->first();
	}

	public function create($data){
		return StatisticUri::create($data);
	}
}