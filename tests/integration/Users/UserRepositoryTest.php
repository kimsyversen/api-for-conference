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

	/**
	 * @var repository
	 */
	protected $repository;

	/**
	 * Namespace to the user model
	 * @var string
	 */
	protected $user = 'Uninett\Eloquent\Users\User';

	/*
	 * Om vi importerer Factory tror jeg vi kan gjøre noe sånt som dette:
	 */
	public function getStub()
	{
		return [
			'email' => str_random(5) . $this->faker->safeEmail,
			'password' => 'password',
			'confirmation_code' => str_random(40),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		];
	}

	protected function _before()
	{
		$this->repository = new UserRepository;

		//Clean database on every test run
		$this->cleanDatabase();
	}

	protected function _after()
	{
	}

	/** @test **/
	public function it_can_create_users()
	{
		$numberOfUsersToCreate = 5;

		TestDummy::times($numberOfUsersToCreate)->create($this->user);

		$users = User::all()->count();

		$this->assertEquals($numberOfUsersToCreate, $users);

	}
	/** @test **/
	public function it_can_save_a_user()
	{
		TestDummy::times(1)->create($this->user);

		$this->assertNotNull(User::find(1));
	}

	/** @test **/
	public function it_can_verify_a_user()
	{
		$created_user =  TestDummy::create($this->user);

		$result = $this->repository->verify($created_user->confirmation_code);

		$this->assertInstanceOf($this->user, $result);

	}
}