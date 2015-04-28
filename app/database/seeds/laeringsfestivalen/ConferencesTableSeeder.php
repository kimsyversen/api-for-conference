<?php namespace database\seeds\laeringsfestivalen;

// Composer: "fzaninotto/faker": "v1.3.0"
use Carbon\Carbon;
use Faker\Factory as Faker;
use HTML;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Users\User;


class ConferencesTableSeeder extends \Seeder {
	public function run()
	{
		Conference::create([
            'name' => 'Læringsfestivalen 2015',
            'description' => 'Læringsfestivalen er en nasjonal konferanse for universitets- og høyskolesektoren med fokus på nye metoder for læring og undervisning ved bruk av teknologi. Målet er å inspirere og motivere, og vise gode og spennende tilnærminger til undervisning og læring, og reflektere rundt de teknologiske mulighetene som eksisterer.',
            'banner' =>  'img/LF15_header.jpg',
			'country' => 'Norway',
			'city' => 'Trondheim (På Gløshaugen, i Elektrobygget, O. S. Bragstads plass 2)',
			'start_date' => Carbon::create(2015, 05, 04),
            'end_date' => Carbon::create(2015, 05, 05),
		]);
	}
}