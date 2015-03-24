<?php namespace database\seeds\nokios2014;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Uninett\Eloquent\Messages\Message;
use Uninett\Eloquent\Users\User;
use Uninett\Eloquent\Chats\Chat;

class MessagesTableSeeder extends \Seeder {

	public function run()
	{
		$faker = Faker::create();

        $chat_ids = Chat::lists('id');

        $user_ids = User::lists('id');

		$now = Carbon::now();
		foreach($chat_ids as $chat_id)
		{
			Message::create([
				'chat_id' => $chat_id,
				'user_id' => 1,
				'text' => 'Velkommen til konferansen for 2015. Dette er første gang vi benytter denne konferanseappen og vi håper du vil like den. Det du kan gjøre med den er å se på konferanseprogrammet. Programmet viser også oppdateringer til sesjoner. I tillegg blir de annonsert i vår newsfeed.
				Hvis du oppretter en konto og logger inn, vil du få mulighet til å lese private meldinger fra andre og opprette ditt eget personlige program. Det er også tilgang til kart hvis du får behov for å finne frem.',
				'created_at' => $now,
				'updated_at' => $now,
			]);
		}
	}

}