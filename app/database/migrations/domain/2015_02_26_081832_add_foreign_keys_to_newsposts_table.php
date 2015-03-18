<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNewspostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('newsposts', function(Blueprint $table)
		{
			$table->foreign('newsfeed_id')->references('id')->on('newsfeeds')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('newsposts', function(Blueprint $table)
		{
			$table->dropForeign(['newsfeed_id']);
			$table->dropForeign(['user_id']);
		});
	}

}
