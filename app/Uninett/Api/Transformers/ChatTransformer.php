<?php namespace Uninett\Api\Transformers;

class ChatTransformer extends Transformer {

    private $userTransformer;

    private $messageTransformer;

    private $groupTransformer;

    function __construct(UserTransformer $userTransformer, MessageTransformer $messageTransformer, GroupTransformer $groupTransformer)
    {
        $this->userTransformer = $userTransformer;

        $this->messageTransformer = $messageTransformer;

        $this->groupTransformer = $groupTransformer;
    }


    public function transform($item)
	{
        $output = [
            'link' => 'conferences/' . $item['conference_id'] . '/chats/' . $item['id'],
            'name' => $item['name'],
            'created_at' => $item['created_at'],
            'updated_at' => $item['updated_at']
        ];

        if (array_key_exists('group_recipients', $item))
            $output['group_recipients'] = $this->groupTransformer->transformCollection($item['group_recipients']);

        if (array_key_exists('user_recipients', $item))
            $output['user_recipients'] = $this->userTransformer->transformCollection($item['user_recipients']);

        if (array_key_exists('messages', $item))
            $output['messages'] = $this->messageTransformer->transformCollection($item['messages']);

        if (array_key_exists('last_message', $item))
            $output['last_message'] = $this->messageTransformer->transform($item['last_message']);

		return $output;
	}
}