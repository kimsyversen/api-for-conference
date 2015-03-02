<?php

class DatabaseSeeder extends Seeder {

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
        'group_conference_user',
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

        'ConferencesTableSeeder',
        'MapsTableSeeder',
        'SessionsTableSeeder',
        'RatingsTableSeeder',
        'ConferenceSchedulesTableSeeder',
        'PersonalSchedulesTableSeeder',
        'QuestionsTableSeeder',

        'RolesTableSeeder',
        'UserConferenceRolesTableSeeder',

        'GroupsTableSeeder',
        'GroupConferenceUsersTableSeeder',

        'ChatsTableSeeder',
        'MessagesTableSeeder',

        'NewsfeedsTableSeeder',
        'NewspostsTableSeeder'

	];


	private function cleanDatabase()
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
