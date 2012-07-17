<?php

// ------------------------------------------------------------
// Application Routes
// ------------------------------------------------------------

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
	}
	
	return Redirect::to('/')->with_errors($val)->with_input();
});


// ------------------------------------------------------------
// Events & Filters
// ------------------------------------------------------------

include path('app').'events.php';
include path('app').'filters.php';