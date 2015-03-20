<?php namespace Uninett\Eloquent\Chats\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Uninett\Eloquent\Chats\Chat;
use Uninett\Eloquent\Users\User;

class EloquentChatRepository {

    /**
     * A buffer for the chat model object to reduce
     * db queries.
     *
     * @var chat
     */
    private $chat;

    /**
     * The recipients for the chat with chat_id
     * equal $this->chat_id
     *
     * @var array
     */
    private $recipients;

    /**
     * The current $this->recipients chat_id
     *
     * @var int
     */
    private $chat_id;

    /**
     * Get the chat with a specific chat_id with
     * users, groups and messages eager loaded.
     *
     * @param $chat_id
     * @return Chat
     */
    private function getChat($chat_id)
    {
        if ($this->chat && $this->chat->id == $chat_id)
        {
            return $this->chat;
        }

        return $this->chat = Chat::with('users')->with('groups.users')->with('messages')->with('messages.user')->findOrFail($chat_id);
    }

    /**
     * Get the recipients for the chat
     *
     * @param $chat_id
     * @return array
     */
    public function getAllUserRecipients($chat_id)
    {
        if ($this->recipients && $this->chat_id == $chat_id)
        {
            return $this->recipients;
        }

        $this->chat_id = $chat_id;

        $recipients = $this->getDirectUserRecipients($chat_id);

        foreach($this->getGroupRecipients($chat_id) as $group)
        {
            $recipients = $recipients->merge($group->users);
        }

        return $this->recipients = $recipients->toArray();
    }

    /**
     * Get the ungrouped user recipients of the chat
     *
     * @param $chat_id
     * @return mixed
     */
    public function getDirectUserRecipients($chat_id)
    {
        return $this->getChat($chat_id)->users;
    }

    /**
     * Get the grouped recipients of the chat
     *
     * @param $chat_id
     * @return mixed
     */
    public function getGroupRecipients($chat_id)
    {
        return $this->getChat($chat_id)->groups;
    }

    /**
     * Get all the chats for a specific user on a specific
     * conference, including the chats for the groups
     * the user is a member of.
     *
     * @param $conference_id
     * @param $user_id
     * @return array
     */
    public function getAllForUserOnConference($conference_id, $user_id)
    {
        $user = User::with('chats')->with('groups.chats')->findOrFail($user_id);

        $chats = $user->chats->filter(function($chat) use($conference_id) {
            return $chat->conference_id == $conference_id;
        });

        $userGroups = $user->groups->filter(function($group) use($conference_id) {
            return $group->conference_id == $conference_id;
        });

        foreach ($userGroups as $userGroup)
        {
            $chats = $chats->merge($userGroup->chats);
        }

        return $chats->toArray();
    }

    /**
     * Find a specific chat on a conference which the
     * user can access. If the user can't access
     * the chat, a ModelNotFoundException
     * is thrown.
     *
     * @param $conference_id
     * @param $chat_id
     * @param $user_id
     * @return array
     */
    public function find($conference_id, $chat_id, $user_id)
    {
        $chat = $this->getChat($chat_id);

        if (! $this->chatHasRecipient($chat_id, $user_id) || $chat->conference_id != $conference_id)
        {
            throw new ModelNotFoundException();
        }

        return $chat->toArray();
    }

    /**
     * Check if a chat has a specific user as a
     * recipient.
     *
     * @param $chat_id
     * @param $user_id
     * @return bool
     */
    public function chatHasRecipient($chat_id, $user_id)
    {
        foreach ($this->getAllUserRecipients($chat_id) as $recipient)
        {
            if ($recipient['id'] == $user_id)
                return true;
        }

        return false;
    }

    /**
     * Get the messages for a specific chat
     *
     * @param $chat_id
     * @return array
     */
    public function getMessages($chat_id)
    {
        $messages = $this->getChat($chat_id)->messages;

        return $messages->toArray();
    }

    /**
     * Get the last message for a specific chat
     *
     * @param $chat_id
     * @return array
     */
    public function getLastMessage($chat_id)
    {
        $message = $this->getChat($chat_id)->messages->sortByDesc('created_at')->first();

        return $message;
    }

    /**
     * Get the total number of recipients in the
     * chat
     *
     * @param $chat_id
     * @return int
     */
    public function getTotalRecipients($chat_id)
    {
        return count($this->getAllUserRecipients($chat_id));
    }
}