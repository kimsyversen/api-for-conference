<?php


use Carbon\Carbon;
use Laracasts\TestDummy\Factory as TestDummy;

use Uninett\Eloquent\Users\Repositories\UserRepository;
use Uninett\Eloquent\Users\User;

class UserRepositoryTest extends IntegrationTest
{
	protected $tester;
	protected $repository;

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

	/**
	 * @var \IntegrationTester
	 */

	protected function _before()
	{
		$this->repository = new UserRepository;
		$this->cleanDatabase();
	}

	protected function _after()
	{

	}

	/** @test **/
	public function it_can_create_users()
	{
		$numberOfUsersToCreate = 5;

		TestDummy::times($numberOfUsersToCreate)->create('Uninett\Eloquent\Users\User');

		$users = User::all()->count();

		$this->assertEquals($numberOfUsersToCreate, $users);

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