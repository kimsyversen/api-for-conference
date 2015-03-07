<?php


class ConferencesTest extends OAuthApiTester {


	public function setUp()
	{
		parent::setUp();

		Route::enableFilters();
	}

    /** @test */
    public function it_can_retrieve_conferences()
    {
        $this->getJson('api/v1/conferences');

        $this->assertResponseOk();
    }

	/** @test */
	public function it_can_retrieve_conferences_with_correct_attributes()
    {
        $response = $this->getJson('api/v1/conferences');

        $this->assertObjectHasAttributes($response, 'data', 'paginator');

        $this->assertObjectHasAttributes($response->data[0], 'link', 'name', 'banner', 'description', 'begins', 'ends');

        $this->assertObjectHasAttributes($response->paginator, 'total_count', 'total_pages', 'current_page', 'limit');
    }




}

