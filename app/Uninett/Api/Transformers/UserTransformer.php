<?php namespace Uninett\Api\Transformers;

class UserTransformer extends Transformer {

	public function transform($item)
	{
		return [
			'email' => $item['email']
		];
	}
}