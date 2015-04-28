<?php namespace Uninett\Api\Transformers;

class ConferenceTransformer extends Transformer {

	public function transform($item)
	{
		return [
			'link' => [
				'uri' => 'conferences/' . $item['id'],
				'rel' => 'self',
			],
			'name' => $item['name'],
			'banner' => url($item['banner']),
			'description' => $item['description'],
			'country' => $item['country'],
			'city' => $item['city'],
            'start_date' => $item['start_date'],
            'end_date' => $item['end_date'],
			'created_at' => $item['created_at'],
            'updated_at' => $item['updated_at']
		];
	}
}