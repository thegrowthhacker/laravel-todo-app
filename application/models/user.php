<?php

class User extends Eloquent {
	
	/**
	 * Overload the default save function
	 *
	 * @return  bool
	 */
	public function save()
	{
		// if we are creating the user, set a random api key
		if( ! $this->exists)
		{
			$this->set_attribute('api_key', Str::random(32));
		}
		
		return parent::save();
	}
	
	/**
	 * Hash password when setting it
	 *
	 * @param   string  $password
	 * @return  void
	 */
	public function set_password($password)
	{
		$this->set_attribute('password', Hash::make($password));
	}
	
}