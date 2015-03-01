<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChatablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chatables', function(Blueprint $table)
		{
			$table->integer('chat_id')->unsigned()->index();
			$table->integer('chatable_id')->unsigned()->index();
            $table->string('chatable_type');
			$table->primary(['chat_id','group_id', 'chatable_type']);
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
		Schema::drop('chatables');
	}

}
