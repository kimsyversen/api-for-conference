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

        // Then I should receive only the relevant ones
        $this->assertCount(5, $paginatedConferences->getCollection());
        $this->assertEquals(15, $paginatedConferences->getTotal());
        $this->assertEquals(3, $paginatedConferences->getLastPage());
        $this->assertEquals(1, $paginatedConferences->getCurrentPage());
        $this->assertEquals(5, $paginatedConferences->getPerPage());
    }

}