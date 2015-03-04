<?php namespace Uninett\Api\Transformers;

use Config;

class ConferenceTransformer extends Transformer {

	public function transform($item)
	{
		return [
			'links' => [
				'uri' => 'conferences/' . $item['id'],
				'rel' => 'self',
			],
			'id' => $item['id'],
			'name' => $item['name'],
			'banner' => $item['banner'],
			'begins' => $item['created_at'],
			'ends' => $item['created_at'],
		];
	}
}