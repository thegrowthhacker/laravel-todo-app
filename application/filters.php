<?php

// ------------------------------------------------------------
// Application Filters
// ------------------------------------------------------------

// Run before each request
Route::filter('before', function()
{
	
});

// Run after each request
Route::filter('after', function($response)
{
	
});

// CSRF protection
Route::filter('csrf', function()
{
	if (Request::forged())
	{
		return Response::error('500');
	}
});

// Require user to be logged in
Route::filter('auth', function()
{
	if (Auth::guest())
	{
		$errors = new Laravel\Messages('You must be logged in to view this page.');
		
		return Redirect::to_route('home')->with_errors($errors);
	}
});