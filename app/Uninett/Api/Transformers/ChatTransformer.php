<?php namespace Uninett\Api\Transformers;

class ChatTransformer extends Transformer {

    private $userTransformer;

    function __construct(UserTransformer $userTransformer)
    {
        $this->userTransformer = $userTransformer;
    }


    public function transform($item)
	{
		return [
            'id' => $item['id'],
			'name' => $item['name'],
            'recipients' => $this->userTransformer->transformCollection($item['recipients']),
            'created_at' => $item['created_at'],
            'updated_at' => $item['updated_at']
		];
	}
}