<?php


class SessionsTest extends ApiTester {


	public function setUp()
	{
		parent::setUp();

		$this->base_url = Config::get('uninett.base_url');

		Route::enableFilters();
	}

    /** @test */
    public function it_is_a_dummy_test()
    {

    }

//    /** @test */
//    public function it_can_retreive_a_specific_conference_session()
//    {
//
//    }

}

