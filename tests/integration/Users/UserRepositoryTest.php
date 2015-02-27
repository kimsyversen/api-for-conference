<?php


use Laracasts\TestDummy\Factory as TestDummy;
use Uninett\Eloquent\Users\Repositories\UserRepository;

class UserRepositoryTest extends \Codeception\TestCase\Test
{
	/**
	 * @var \IntegrationTester
	 */
	protected $tester;

	protected $repository;

	protected function _before()
	{
		$this->repository = new UserRepository(new \Uninett\Validation\UserValidator());
	}

	protected function _after()
	{

	}

	/** @test **/
	public function it_can_save_a_user()
	{
		$user =  TestDummy::create('Uninett\Eloquent\Users\User');

		$result = $this->repository->save($user);

		$this->assertNotNull($user);

	}

}