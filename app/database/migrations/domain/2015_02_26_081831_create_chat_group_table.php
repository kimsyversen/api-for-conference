<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChatGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chat_group', function(Blueprint $table)
		{
			$table->integer('chat_id')->unsigned()->index();
			$table->integer('group_id')->unsigned()->index();
			$table->primary(['chat_id','group_id']);
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
		Schema::drop('chat_group');
	}

}
