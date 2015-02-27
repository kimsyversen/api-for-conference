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

	public function increment($id, $column){
		$statistics = Statistic::find($id);
		$statistics->increment($column);
	}

}