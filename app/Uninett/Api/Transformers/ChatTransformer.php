<?php namespace Uninett\Api\Transformers;

class ChatTransformer extends Transformer {

	public function transform($item)
	{
		return [
            'id' => $item['id'],
			'name' => $item['name'],
            'created_at' => $item['created_at'],
            'updated_at' => $item['updated_at']
		];
	}
}