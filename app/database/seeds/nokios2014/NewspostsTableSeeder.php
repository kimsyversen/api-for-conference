<?php namespace database\seeds\nokios2014;

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Uninett\Eloquent\Newsfeeds\Newsfeed;
use Uninett\Eloquent\Newsposts\Newspost;
use Uninett\Eloquent\Users\User;

class NewspostsTableSeeder extends \Seeder {

	public function run()
	{
        $newsfeed_ids = Newsfeed::lists('id');

		foreach($newsfeed_ids as $newsfeed_id)

				Newspost::create([
	                'newsfeed_id' => $newsfeed_id,
	                'user_id' => 1,
	                'title' => 'Velkommen til konferansen for 2015',
	                'body' => 'Dette er første gang vi benytter denne konferanseappen og vi håper du vil like den. Det du kan gjøre med den er å se på konferanseprogrammet. Programmet viser også oppdateringer til sesjoner. I tillegg blir de annonsert i vår newsfeed.
				Hvis du oppretter en konto og logger inn, vil du få mulighet til å lese private meldinger fra andre og opprette ditt eget personlige program. Det er også tilgang til kart hvis du får behov for å finne frem.',
				]);

	}

}