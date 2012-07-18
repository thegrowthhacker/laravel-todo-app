<?php

class TodoList extends Eloquent {
	
	/**
	 * The name of the table associated with the model.
	 *
	 * @var  string
	 */
	public static $table = 'lists';
	
	/**
	 * Validate data for the model.
	 *
	 * @return  bool|Validator
	 */
	public function validate()
	{
		// set rules
		$val = Validator::make($this->attributes, array(
			'name' => 'required',
		));
		
		if($val->passes())
		{
			return true;
		}
		
		return $val;
	}
	
	/**
	 * Determine if this list belongs to the logged in user.
	 *
	 * @return  bool
	 */
	public function is_mine()
	{
		if( ! Auth::check())
		{
			return false;
		}
		
		return $this->get_attribute('user_id') == Auth::user()->id;
	}
	
}