<?php
use Carbon\Carbon;
use Laracasts\TestDummy\Factory as TestDummy;
use Uninett\Eloquent\StatisticUris\StatisticUriRepository;
use Uninett\Eloquent\Users\Repositories\UserRepository;
use Uninett\Eloquent\Users\User;

class StatisticUriRepositoryTest extends \Codeception\TestCase\Test
{
	/**
	 * @var \IntegrationTester
	 */
	protected $tester;

	protected $statisticUrisRepository;

	protected function _before()
	{
		$this->statisticUrisRepository = new StatisticUriRepository();
	}

	protected function _after()  {}

	/** @test **/
	public function it_can_save_a_new_uri()
	{
		$result = $this->statisticUrisRepository->create($this->getNewUriRecord());

		$this->assertNotNull($result);
	}

	/** @test **/
	public function it_can_find_a_uri()
	{
		$uri = TestDummy::create('Uninett\Eloquent\StatisticUris\StatisticUri');

		$results = $this->statisticUrisRepository->find($uri->name);

		$this->assertNotNull($results);
	}

	/** @test **/
	public function it_can_not_find_uri_that_doesnt_exist()
	{
		$results = $this->statisticUrisRepository->find('/surethisdoesnotexist');

		$this->assertNull($results);
	}

	private function getNewUriRecord()
	{
		return  [
			'name' => 'abc',
			'created_at' => Carbon::now()
		];
	}
}