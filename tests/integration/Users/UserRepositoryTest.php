<?php


use Carbon\Carbon;
use Laracasts\TestDummy\Factory as TestDummy;
use Uninett\Eloquent\Users\Repositories\UserRepository;
use Uninett\Eloquent\Users\User;

class UserRepositoryTest extends IntegrationTest
{
	/**
	 * @var \IntegrationTester
	 */
	protected $tester;

	protected $repository;

	protected function _before()
	{
		$this->repository = new UserRepository();

		$this->cleanDatabase();
	}

	protected function _after()
	{

	}

	/** @test **/
	public function it_can_save_a_user()
	{
		$user = [
			'email' => 'someUsername@someEmail.com',
			'password' => 'password',
			'confirmation_code' => str_random(40),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		];

		$result = User::create($user);

		$this->assertNotNull($result);

	}

	/** @test **/
	public function it_can_verify_a_user()
	{
		$created_user =  TestDummy::create('Uninett\Eloquent\Users\User');



		$result = $this->repository->verify($created_user->confirmation_code);

		$this->assertInstanceOf('\Uninett\Eloquent\Users\User', $result);

	}

}