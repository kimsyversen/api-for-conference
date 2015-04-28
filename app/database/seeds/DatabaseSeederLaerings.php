<?php

class DatabaseSeederLaerings extends Seeder {

	protected $tables = [
		'users',
		'oauth_scopes',
		'oauth_clients',
		'oauth_sessions',
		'oauth_access_tokens',
        'chatables',
        'chats',
        'conference_roles',
        'conference_schedules',
        'conferences',
        'group_user',
        'groups',
        'maps',
        'messages',
        'newsfeeds',
        'newsposts',
        'personal_schedules',
        'questions',
        'ratings',
        'roles',
        'schedulables',
        'sessions',
		'speakers'
	];

    protected $seeders = [
        'UserTableSeeder',
        'OAuthTestSeeder',
        'database\seeds\laeringsfestivalen\ConferencesTableSeeder',
        'database\seeds\laeringsfestivalen\MapsTableSeeder',
        'database\seeds\laeringsfestivalen\SessionsTableSeeder',
        'database\seeds\laeringsfestivalen\ConferenceSchedulesTableSeeder',
        'database\seeds\laeringsfestivalen\RolesTableSeeder',
        'database\seeds\laeringsfestivalen\UserConferenceRolesTableSeeder',
        'database\seeds\laeringsfestivalen\GroupsTableSeeder',
        'database\seeds\laeringsfestivalen\NewsfeedsTableSeeder',
        'database\seeds\laeringsfestivalen\NewspostsTableSeeder',
	];


    public function seed($seeders)
    {
        Eloquent::unguard();

        $this->cleanDatabase();
        foreach($seeders as $seeder)
            $this->call($seeder);
    }


	public function cleanDatabase()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0');

		foreach($this->tables as $table)
			DB::table($table)->truncate();

		DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}


	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->cleanDatabase();
		foreach($this->seeders as $seeder)
			$this->call($seeder);
	}

}
