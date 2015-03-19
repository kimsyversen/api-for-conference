<?php namespace Uninett\Eloquent\Chats\RequestConferenceChatCommand;

class RequestConferenceChatCommand {

    /**
     * @var string
     */
    public $conference_id;

    /**
     * @var string
     */
    public $chat_id;

    /**
     * @var string
     */
    public $user_id;

    /**
     * @param string conference_id
     * @param string chat_id
     * @param string user_id
     */
    public function __construct($conference_id, $chat_id, $user_id)
    {
        $this->conference_id = $conference_id;
        $this->chat_id = $chat_id;
        $this->user_id = $user_id;
    }

}