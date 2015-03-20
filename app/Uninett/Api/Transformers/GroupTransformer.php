<?php namespace Uninett\Api\Transformers;

class GroupTransformer extends Transformer {

    private $userTransformer;

    function __construct(UserTransformer $userTransformer)
    {
        $this->userTransformer = $userTransformer;
    }

    public function transform($item)
	{
        $output = [
            'name' => $item['name']
        ];

        if (array_key_exists('users', $item))
            $output['users'] = $this->userTransformer->transformCollection($item['users']);

		return $output;
	}
}