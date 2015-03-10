<?php

use Laracasts\TestDummy\Factory as TestDummy;

class ConferencesTest extends OAuthApiTester {


	public function setUp()
	{
		parent::setUp();

		Route::enableFilters();
	}

    /** @test */
    public function it_can_retrieve_conferences()
    {
        $conference = TestDummy::create('default_conference');

        //dd($conference);

//        $this->getJson('api/v1/conferences');
//
//        $this->assertResponseOk();
    }

//	/** @test */
//	public function it_can_retrieve_conferences_with_correct_attributes()
//    {
//        $response = $this->getJson('api/v1/conferences');
//
//        $this->assertObjectHasAttributes($response, 'data', 'paginator');
//
//        $this->assertObjectHasAttributes($response->data[0], 'link', 'name', 'banner', 'description', 'created_at', 'updated_at');
//
//        $this->assertObjectHasAttributes($response->paginator, 'total_count', 'total_pages', 'current_page', 'limit');
//    }




}

