<?php

// ------------------------------------------------------------
// Application Routes
// ------------------------------------------------------------

include path('app').'routes/lists.php';

// Login page
// GET /
Route::get('/', function()
{
	return View::make('app.index', array(
		'title' => 'Home',
	));
});

// Login action
// POST /
Route::post('/', function()
{
	// setup validations
	$val = Validator::make(Input::get(), array(
		'email'    => 'required|email',
		'password' => 'required',
	));
	
	if($val->passes())
	{
		// try to log the user in
		$credentials = array(
			'username' => Input::get('email'),
			'password' => Input::get('password'),
			'remember' => (Input::get('remember') == 'y'),
		);
		
		if(Auth::attempt($credentials))
		{
			return Redirect::to('lists');
		}
		
		$val = new Laravel\Messages('Email address or password was incorrect.');
	}
	
	return Redirect::to('/')->with_errors($val)->with_input();
});

// Logout
// GET /logout
Route::get('logout', function()
{
	Auth::logout();
	
	return Redirect::to('/');
});


// ------------------------------------------------------------
// Events & Filters
// ------------------------------------------------------------

include path('app').'events.php';
include path('app').'filters.php';