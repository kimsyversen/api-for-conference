<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('schedules', function(Blueprint $table)
		{
			$table->foreign('session_id')->references('id')->on('sessions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('schedulable_id', 'schedules_schedulable_id_foreign_conference_schedules')->references('id')->on('conference_schedules')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('schedulable_id', 'schedules_schedulable_id_foreign_personal_schedules')->references('id')->on('personal_schedules')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('schedules', function(Blueprint $table)
		{
			$table->dropForeign(['session_id']);
			$table->dropForeign('schedules_schedulable_id_foreign_conference_schedules');
			$table->dropForeign('schedules_schedulable_id_foreign_personal_schedules');
		});
	}

}
