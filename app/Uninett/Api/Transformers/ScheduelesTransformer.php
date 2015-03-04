<?php namespace Uninett\Api\Transformers;


class SchedulesTransformer extends Transformer {

	public function transform($item)
	{
		$sessions = [];

		foreach($item['sessions'] as $session)
		{
			$sessions[] = [
				'title' => $session['title'],
				'location' => $session['location'],
				'belongs_to_conference' => $session['conference_id']
			];
		}
		return [
			'program_id' => $item['id'],
			'conference_id' => $item['conference_id'],
			'created_at' => $item['created_at'],
			'sessions' => $sessions
		];
	}
}