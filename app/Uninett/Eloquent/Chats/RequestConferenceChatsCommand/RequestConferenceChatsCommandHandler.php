<?php namespace Uninett\Eloquent\Chats\RequestConferenceChatsCommand;

use Laracasts\Commander\CommandHandler;
use Uninett\Eloquent\Chats\Repositories\EloquentChatRepository;

class RequestConferenceChatsCommandHandler implements CommandHandler {

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
     * @return \Illuminate\Database\Eloquent\Collection|mixed|static[]
     */
    public function handle($command)
    {
        $chats = $this->chatRepository->getAllForUserOnConference($command->conference_id, $command->user_id);

        $chats = array_map(function($chat) {
            $chat['total_recipients'] = $this->chatRepository->getTotalRecipients($chat['id']);
            $chat['group_recipients'] = $this->chatRepository->getGroupRecipients($chat['id'])->toArray();
            $chat['user_recipients'] = $this->chatRepository->getDirectUserRecipients($chat['id'])->toArray();
            $chat['last_message'] = $this->chatRepository->getLastMessage($chat['id']);
            return $chat;
        }, $chats);

        return $chats;
    }

}