<?php
use Carbon\Carbon;
use Laracasts\TestDummy\Factory as TestDummy;
use Uninett\Eloquent\Statistics\StatisticRepository;
use Uninett\Eloquent\StatisticUris\StatisticUriRepository;
use Uninett\Eloquent\Users\Repositories\UserRepository;
use Uninett\Eloquent\Users\User;

class StatisticsRepositoryTest extends \Codeception\TestCase\Test
{
	/**
	 * @var \IntegrationTester
	 */
	protected $tester;
	protected $statisticsRepository;
	protected $statistic_uris;

	protected function _before()
	{
		$this->statisticsRepository = new StatisticRepository();

		$this->statistic_uris = TestDummy::times(10)->create('Uninett\Eloquent\StatisticUris\StatisticUri');
	}

	protected function _after()
	{

	}

	/** @test */
	public function it_can_create_statistic_for_a_uri()
	{
		$result = $this->statisticsRepository->create($this->getNewStatisticRecord());

		$this->assertNotNull($result);
	}

	/** @test */
	public function it_can_find_statistic_for_an_uri_in_a_given_time_interval()
	{
		$object = TestDummy::create('Uninett\Eloquent\Statistics\Statistic', $this->getNewStatisticRecord());

		$result = $this->statisticsRepository->whereCreatedAtBetween(
			$object->created_at->subHours(2),
			$object->created_at->addHour(1)
		);

		$this->assertNotNull($result);
	}

	/** @test */
	public function it_does_not_find_non_existing_uri_in_a_given_time_interval()
	{
		$object = TestDummy::create('Uninett\Eloquent\Statistics\Statistic', $this->getNewStatisticRecord());

		$result = $this->statisticsRepository->whereCreatedAtBetween(
			$object->created_at->subHours(3),
			$object->created_at->subHours(2)
		);

		$this->assertNull($result);
	}

	private function getNewStatisticRecord()
	{
		return  [
			'hits' => 1,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
			'statistic_uri_id' => $this->statistic_uris[0]->id
		];
	}
}