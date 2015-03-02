<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewspostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('newsposts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('newsfeed_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
            $table->string('title');
            $table->text('body');
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
		Schema::drop('newsposts');
	}

}
