<?php

use Uninett\Eloquent\Conferences\Repositories\EloquentConferenceRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class EloquentConferenceRepositoryTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;

    /**
     * @var EloquentConferenceRepository
     */
    protected $repo;

    protected function _before()
    {
        $this->repo = $this->tester->grabService('Uninett\Eloquent\Conferences\Repositories\EloquentConferenceRepository');

    }

    protected function _after()
    {
    }

    /** @test */
    public function it_gets_all_conferences_paginated()
    {
        // Given I have 15 conferences
        TestDummy::times(15)->create('Uninett\Eloquent\Conferences\Conference');

        // When I fetch all paginated conferences with a limit of 5
        $paginatedConferences = $this->repo->getPaginator(5);

        // Then the result should be an instance of a paginator
        $this->assertInstanceOf('Illuminate\Pagination\Paginator', $paginatedConferences);

        // And the instance in the paginated collection should be a conference
        $this->assertInstanceOf('Uninett\Eloquent\Conferences\Conference', $paginatedConferences->getCollection()[0]);
    }

}