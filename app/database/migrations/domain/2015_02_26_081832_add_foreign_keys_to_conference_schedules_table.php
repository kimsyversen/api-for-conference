<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToConferenceSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('conference_schedules', function(Blueprint $table)
		{
			$table->foreign('conference_id')->references('id')->on('conferences')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('conference_schedules', function(Blueprint $table)
		{
			$table->dropForeign(['conference_id']);
		});
	}

}
