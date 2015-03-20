<?php namespace Uninett\Eloquent\Chats\RequestConferenceChatCommand;

use Laracasts\Commander\CommandHandler;
use Uninett\Eloquent\Chats\Repositories\EloquentChatRepository;

class RequestConferenceChatCommandHandler implements CommandHandler {

    /**
     * @var EloquentChatRepository
     */
    private $chatRepository;

    /**
     * @param EloquentChatRepository $chatRepository
     */
    function __construct(EloquentChatRepository $chatRepository)
    {
        $this->chatRepository = $chatRepository;
    }

    /**
     * Handle the command.
     *
     * @param object $command
     * @return \Illuminate\Support\Collection|mixed|null|static
     */
    public function handle($command)
    {
        $chat = $this->chatRepository->find($command->conference_id, $command->chat_id, $command->user_id);

        $chat['recipients'] = $this->chatRepository->getAllUserRecipients($command->chat_id);

        $chat['messages'] = $this->chatRepository->getMessages($command->chat_id);

        return $chat;
    }

}