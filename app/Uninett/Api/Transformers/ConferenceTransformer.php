<?php namespace Uninett\Api\Transformers;

class ConferenceTransformer extends Transformer {

	public function transform($item)
	{
		return [
			'conference_name' => $item['name'],
			'conference_banner' => $item['banner'],
			'conference_starts' => $item['created_at'],
		];
	}
}