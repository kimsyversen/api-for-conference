<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToChatablesTable2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('chatables', function(Blueprint $table)
		{
            $table->foreign('chatable_id', 'chat_recipients_chatable_id_foreign_groups')->references('id')->on('groups')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('chatable_id', 'chat_recipients_chatable_id_foreign_users')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('chatables', function(Blueprint $table)
		{
            $table->dropForeign('chat_recipients_chatable_id_foreign_groups');
            $table->dropForeign('chat_recipients_chatable_id_foreign_users');
		});
	}

}
