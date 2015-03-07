<?php namespace Uninett\Eloquent\Conferences\Repositories;

use Illuminate\Pagination\Paginator;

interface ConferenceRepositoryInterface {

    /**
     * @param $limit
     * @return Paginator
     */
    public function getPaginator($limit);

}