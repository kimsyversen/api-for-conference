<?php
use Carbon\Carbon;
use Laracasts\TestDummy\Factory as TestDummy;
use Uninett\Eloquent\Schedules\ConferenceScheduleRepository;

class ConferenceScheduleRepositoryTest extends \Codeception\TestCase\Test
{
	/**
	 * @var \IntegrationTester
	 */
	protected $tester;
	protected $scheduleRepository;

	protected function _before()
	{
		$this->scheduleRepository = new ConferenceScheduleRepository();
	}

	protected function _after(){}


	/** @test */
	public function it_can_find_schedules_for_a_conference()
	{
		$result = $this->scheduleRepository->find(1);

		$this->assertNotEmpty($result);
		$this->assertNotNull($result);
	}

	/** @test */
	public function it_can_not_find_schedules_for_a_conference_that_does_not_exist()
	{
		$result = $this->scheduleRepository->find(99999999);

		$this->assertEmpty($result);


	}




}