<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupConferenceUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_conference_user', function(Blueprint $table)
		{
			$table->integer('conference_id')->unsigned()->index();
			$table->integer('group_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->primary(['conference_id','group_id','user_id']);
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
		Schema::drop('group_conference_user');
	}

}
