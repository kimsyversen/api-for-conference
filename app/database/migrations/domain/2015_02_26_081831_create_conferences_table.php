<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConferencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conferences', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('banner');
            $table->integer('active_schedule_id')->unsigned()->nullable()->index();
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
		Schema::drop('conferences');
	}

}
