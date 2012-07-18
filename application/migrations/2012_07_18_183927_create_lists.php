<?php

class Create_Lists {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lists', function($table)
		{
			$table->increments('id');
			$table->string('name', 100);
			$table->integer('user_id');
			$table->timestamps();
			
			$table->foreign('user_id')->references('id')->on('users')->on_delete('cascade')->on_update('cascade');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lists');
	}

}