<?php namespace Uninett\Api\Transformers;


class MessageTransformer extends Transformer{

    private $userTransformer;

    function __construct(UserTransformer $userTransformer)
    {
        $this->userTransformer = $userTransformer;
    }


    public function transform($item)
    {
        return [
            'user' => $this->userTransformer->transform($item['user']),
            'message' => $item['text'],
            'created_at' => $item['created_at'],
            'updated_at' => $item['updated_at']
        ];
    }
}