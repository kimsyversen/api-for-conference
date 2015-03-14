<?php namespace Uninett\Eloquent\Maps\Repositories;


use Uninett\Eloquent\Conferences\Conference;

class EloquentMapRepository {

    public function getAllForConference($conference_id)
    {
        return Conference::with('maps')->findOrFail($conference_id)->maps;
    }
}