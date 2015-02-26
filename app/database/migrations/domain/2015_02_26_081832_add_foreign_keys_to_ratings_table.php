<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRatingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ratings', function(Blueprint $table)
		{
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('ratable_id', 'ratings_ratable_id_foreign_conferences')->references('id')->on('conferences')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('ratable_id', 'ratings_ratable_id_foreign_sessions')->references('id')->on('sessions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ratings', function(Blueprint $table)
		{
			$table->dropForeign(['user_id']);
			$table->dropForeign('ratings_ratable_id_foreign_conferences');
			$table->dropForeign('ratings_ratable_id_foreign_sessions');
		});
	}

}
