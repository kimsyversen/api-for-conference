<?php namespace database\seeds\nokios2014;

// Composer: "fzaninotto/faker": "v1.3.0"
use Carbon\Carbon;
use Faker\Factory as Faker;
use Uninett\Eloquent\Conferences\Conference;


class ConferencesTableSeeder extends \Seeder {

    private $faker;

	public function run()
	{
		$this->faker = Faker::create();

		Conference::create([
            'name' => 'Nokios 2015',
            'description' => 'Møteplassen NOKIOS er åpen for alle aktører innen offentlig sektor. Vi jobber hvert år for å skape en konferanse for deltakere fra statlige etater, fylker, kommuner, forskningsinstitusjoner og leverandører. Målet med NOKIOS er å skape en nettverksarena for utvikling av en helhetlig og moderne offentlig sektor. En rekke sentrale aktører: DIFI, UiO, NTNU og flere offentlige organer og bedrifter bidrar til å skape NOKIOS.',
            'banner' => 'http://www.3in.no/wp-content/uploads/Nokios_trondheim_28.-30.oktober_2014.png',
			'country' => 'Norway',
			'city' => 'Trondheim',
			'start_date' => Carbon::now()->hour(8)->minute(0)->second(0),
            'end_date' => Carbon::now()->addDays(2)->hour(22)->minute(0)->second(0),
		]);

        Conference::create([
            'name' => 'NKUL 2015',
            'description' => 'Norges største og viktigste møteplass for oss som arbeider med IKT og skole. Målgrupper: Lærere i grunn- og videregående skole, barnehagelærere, skoleledere, skoleeiere, lærerutdannere, lærerstudenter og andre aktører i utdanningssektoren.',
            'banner' => 'https://barnehageblogg.files.wordpress.com/2012/12/nkul.jpg?w=450',
            'country' => 'Norway',
            'city' => 'Trondheim',
            'start_date' => Carbon::now()->hour(8)->minute(0)->second(0),
            'end_date' => Carbon::now()->addDays(2)->hour(22)->minute(0)->second(0),
        ]);

	}

}