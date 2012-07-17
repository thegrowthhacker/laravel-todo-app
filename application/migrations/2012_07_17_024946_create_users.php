<?php

class Create_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('name', 100);
			$table->string('email', 100)->unique();
			$table->string('password', 60);
			$table->string('api_key', 32)->unique();
			$table->timestamps();
		});
		
		// add default user
		// @NOTE: user model must already be setup
		$user = new User;
		
		$user->name = 'Admin';
		$user->email = 'admin@admin.com';
		$user->password = 'admin';
		
		$user->save();
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}