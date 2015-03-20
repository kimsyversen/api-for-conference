<?php namespace Uninett\Api\Transformers;

class ChatTransformer extends Transformer {

    private $userTransformer;

    private $messageTransformer;

    function __construct(UserTransformer $userTransformer, MessageTransformer $messageTransformer)
    {
        $this->userTransformer = $userTransformer;

        $this->messageTransformer = $messageTransformer;
    }


    public function transform($item)
	{
        $output = [
            'link' => 'conferences/' . $item['conference_id'] . '/chats/' . $item['id'],
            'name' => $item['name'],
            'created_at' => $item['created_at'],
            'updated_at' => $item['updated_at']
        ];

        if (array_key_exists('recipients', $item))
            $output['recipients'] = $this->userTransformer->transformCollection($item['recipients']);

        if (array_key_exists('messages', $item))
            $output['messages'] = $this->messageTransformer->transformCollection($item['messages']);

		return $output;
	}
}