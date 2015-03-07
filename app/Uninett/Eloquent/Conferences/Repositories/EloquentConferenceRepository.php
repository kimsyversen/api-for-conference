<?php namespace Uninett\Eloquent\Conferences\Repositories;

use Laracasts\Commander\Events\EventGenerator;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Conferences\Events\ConferencesIsRequested;

class EloquentConferenceRepository implements ConferenceRepositoryInterface {

    use EventGenerator;

    /**
     * @param $limit
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginator($limit)
    {
        $conferencePaginator = Conference::paginate($limit);

        $this->raise(new ConferencesIsRequested($conferencePaginator));

        return $conferencePaginator;
    }

}