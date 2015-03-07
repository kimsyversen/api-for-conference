<?php namespace Uninett\Eloquent\Conferences\Repositories;

use Uninett\Eloquent\Conferences\Conference;

class EloquentConferenceRepository implements ConferenceRepositoryInterface{

    /**
     * @param $limit
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginator($limit)
    {
        return Conference::paginate($limit);
    }

}