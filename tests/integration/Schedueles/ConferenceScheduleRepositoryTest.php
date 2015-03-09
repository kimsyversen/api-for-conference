<?php

use Uninett\Eloquent\Schedules\Repositories\EloquentConferenceScheduleRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class ConferenceScheduleRepositoryTest extends \Codeception\TestCase\Test
{
	/**
	 * @var \IntegrationTester
	 */
	protected $tester;
	protected $scheduleRepository;

	protected function _before()
	{
		$this->scheduleRepository = new EloquentConferenceScheduleRepository();
	}

	protected function _after(){}


	/** @test */
	public function it_can_find_schedules_for_a_conference()
	{
        // TODO: Denne må produsere sin egen data...

		$result = $this->scheduleRepository->getAllForConference(1);

		$this->assertNotEmpty($result);
		$this->assertNotNull($result);
	}

	/** @test */
	public function it_can_not_find_schedules_for_a_conference_that_does_not_exist()
	{
        $result = $this->scheduleRepository->getAllForConference(99999999);

		$this->assertEmpty($result);
	}




}