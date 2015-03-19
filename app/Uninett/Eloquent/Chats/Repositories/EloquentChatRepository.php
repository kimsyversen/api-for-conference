<?php namespace Uninett\Eloquent\Chats\Repositories;

use Uninett\Eloquent\Users\User;

class EloquentChatRepository {

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

        return $chats;
    }
}