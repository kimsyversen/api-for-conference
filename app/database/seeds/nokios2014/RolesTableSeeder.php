<?php namespace database\seeds\nokios2014;
use Uninett\Eloquent\Roles\Role;

class RolesTableSeeder extends \Seeder {

	public function run()
	{
        Role::create([
            'name' => 'admin'
        ]);

        Role::create([
            'name' => 'co-admin'
        ]);

        Role::create([
            'name' => 'participant'
        ]);
	}

}