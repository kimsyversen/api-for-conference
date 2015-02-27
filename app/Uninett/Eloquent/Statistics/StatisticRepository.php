<?php namespace Uninett\Eloquent\Statistics; 

class StatisticRepository {

	public function whereCreatedAtBetween($start, $end){
		return Statistic::whereBetween (
			'created_at', [$start, $end]
		)->first();
	}

	public function create($data){
		return Statistic::create($data);
	}

	public function increment($column){
		return Statistic::increment($column);

	}
}