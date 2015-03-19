<?php namespace Uninett\Eloquent\Chats\Repositories;

use Uninett\Eloquent\Chats\Chat;
use Uninett\Eloquent\Users\User;

class EloquentChatRepository {

    /**
     * Get all the chats for a specific user on a specific
     * conference, including the chats for the groups
     * the user is a member of.
     *
     * @param $conference_id
     * @param $user_id
     * @return mixed
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
     *
     *
     * @param $chat_id
     * @return mixed
     */
    public function getRecipients($chat_id)
    {
        $chat = Chat::with('users')->with('groups.users')->findOrFail($chat_id);

        $recipients = $chat->users;

        foreach($chat->groups as $group)
        {
            $recipients = $recipients->merge($group->users);
        }

        return $recipients->toArray();
    }
}