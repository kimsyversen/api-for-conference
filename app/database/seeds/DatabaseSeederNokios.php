<?php

class DatabaseSeederNokios extends Seeder {

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
	];

    protected $seeders = [
        'UserTableSeeder',
        'OAuthTestSeeder',

        'database\seeds\nokios2014\ConferencesTableSeeder',
        'database\seeds\nokios2014\MapsTableSeeder',
        'database\seeds\nokios2014\SessionsTableSeeder',
        'database\seeds\nokios2014\RatingsTableSeeder',
        'database\seeds\nokios2014\ConferenceSchedulesTableSeeder',
        'database\seeds\nokios2014\PersonalSchedulesTableSeeder',
        'database\seeds\nokios2014\QuestionsTableSeeder',
        'database\seeds\nokios2014\RolesTableSeeder',
        'database\seeds\nokios2014\UserConferenceRolesTableSeeder',
        'database\seeds\nokios2014\GroupsTableSeeder',
        'database\seeds\nokios2014\ChatsTableSeeder',
        'database\seeds\nokios2014\MessagesTableSeeder',
        'database\seeds\nokios2014\NewsfeedsTableSeeder',
        'database\seeds\nokios2014\NewspostsTableSeeder'

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
