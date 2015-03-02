<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchedulablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schedulables', function(Blueprint $table)
		{
			$table->integer('session_id')->unsigned()->index();
			$table->integer('schedulable_id')->unsigned()->index();
			$table->string('schedulable_type');
			$table->primary(['session_id','schedulable_id','schedulable_type']);
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
		Schema::drop('schedulables');
	}

}
