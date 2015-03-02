<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSchedulablesTable2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('schedulables', function(Blueprint $table)
		{
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
		Schema::table('schedulables', function(Blueprint $table)
		{
            $table->dropForeign('schedules_schedulable_id_foreign_conference_schedules');
            $table->dropForeign('schedules_schedulable_id_foreign_personal_schedules');
		});
	}

}
