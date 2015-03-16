<?php namespace Uninett\Eloquent\Sessions\Repositories;

interface ConferenceSessionRepositoryInterface
{
    public function getConferenceSession($conference_id, $session_id);

    public function checkPersonalProgram($conference_id, $user_id, $session);
}