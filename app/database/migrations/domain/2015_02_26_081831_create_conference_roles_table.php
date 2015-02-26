<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConferenceRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conference_roles', function(Blueprint $table)
		{
			$table->integer('role_id')->unsigned()->index();
			$table->integer('conference_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->primary(['role_id','conference_id','user_id']);
            $table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('conference_roles');
	}

}
