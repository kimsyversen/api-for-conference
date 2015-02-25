<?php namespace Uninett\Api\Transformers;

class UserTransformer extends Transformer {

	public function transform($item)
	{
		return [
			'username' => $item['username'],
			'email' => $item['email']
		];
	}
}