<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToConferencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('conferences', function(Blueprint $table)
		{
			$table->foreign('active_schedule_id')->references('id')->on('conference_schedules')->onUpdate('cascade')->onDelete('set null');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('conferences', function(Blueprint $table)
		{
			$table->dropForeign(['active_schedule_id']);
		});
	}

}
