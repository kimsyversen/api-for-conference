<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sessions', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('conference_id')->unsigned()->index();
            $table->string('title');
            $table->longText('description');
            $table->string('location');
            $table->enum('category', ['social', 'professional', 'break']);
            $table->boolean('confirmed');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
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
		Schema::drop('sessions');
	}

}
