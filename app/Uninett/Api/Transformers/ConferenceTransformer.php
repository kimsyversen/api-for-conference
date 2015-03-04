<?php namespace Uninett\Api\Transformers;

use Config;

class ConferenceTransformer extends Transformer {

	public function transform($item)
	{
		return [
			'link' => [
				'uri' => 'conferences/' . $item['id'],
				'rel' => 'self',
			],
			'name' => $item['name'],
			'banner' => $item['banner'],
			'begins' => $item['created_at'],
			'ends' => $item['created_at'],
		];
	}
}