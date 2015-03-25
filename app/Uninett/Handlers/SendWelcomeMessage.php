<?php namespace Uninett\Handlers;

use Carbon\Carbon;
use Eloquent;
use Laracasts\Commander\Events\EventListener;
use Uninett\Eloquent\Chats\Chat;
use Uninett\Eloquent\Groups\Group;
use Uninett\Eloquent\Messages\Message;
use Uninett\Users\Registration\Events\UserHasBeenVerified;

class SendWelcomeMessage extends EventListener {

    // TODO: Dette er midlertidig kode! Fjern dette monsteret!
	public function whenUserHasBeenVerified(UserHasBeenVerified $event)
	{
        Eloquent::unguard();

        $conference_id = 1;

        $now = Carbon::now();

        $group = Group::where('conference_id', '=', $conference_id)->where('name', 'admin')->first();

        $chat = Chat::create([
            'conference_id' => $conference_id,
            'name' => 'Administration group'
        ]);

        $chat->groups()->save($group);

        $chat->users()->save($event->user);

        Message::create([
            'user_id' => 1,
            'chat_id' => $chat->id,
            'text' => 'Velkommen til konferansen for 2015. Dette er første gang vi benytter denne konferanseappen og vi håper du vil like den. Det du kan gjøre med den er å se på konferanseprogrammet. Programmet viser også oppdateringer til sesjoner. I tillegg blir de annonsert i vår newsfeed.
				Hvis du oppretter en konto og logger inn, vil du få mulighet til å lese private meldinger fra andre og opprette ditt eget personlige program. Det er også tilgang til kart hvis du får behov for å finne frem.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Eloquent::reguard();
	}
}