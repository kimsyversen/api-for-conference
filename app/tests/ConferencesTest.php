<?php

use Laracasts\TestDummy\Factory as TestDummy;

class ConferencesTest extends ApiTester {

    /** @test */
    public function it_fetches_conferences()
    {
        TestDummy::create('Uninett\Eloquent\Conferences\Conference');

        $this->getJson('api/v1/conferences');

        $this->assertResponseOk();
    }

	/** @test */
	public function it_fetches_conferences_with_correct_attributes()
    {
        TestDummy::times(3)->create('Uninett\Eloquent\Conferences\Conference');

        $response = $this->getJson('api/v1/conferences');

        $this->assertObjectHasAttributes($response, 'data', 'paginator');

        $this->assertCount(3, $response->data);

        $this->assertObjectHasAttributes($response->data[0], 'link', 'name', 'banner', 'description', 'country', 'city', 'created_at', 'updated_at');

        $this->assertObjectHasAttributes($response->paginator, 'total_count', 'total_pages', 'current_page', 'limit');
    }

    /** @test */
    public function it_fetches_a_single_conference()
    {

    }

}

