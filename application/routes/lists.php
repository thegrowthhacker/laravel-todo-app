<?php

// ------------------------------------------------------------
// List Filters
// ------------------------------------------------------------

Route::filter('pattern: lists, lists/*', 'auth');


// ------------------------------------------------------------
// List Routes
// ------------------------------------------------------------

// Lists overview
// GET /lists
Route::get('lists', function()
{
	return 'Lists overview';
});

// View list
// GET /lists/$id
Route::get('lists/(:num)', function($id)
{
	return "Viewing list #{$id}";
});

// Create new list
// GET /lists/new
Route::get('lists/new', function()
{
	return 'Create new list form';
});

// New list action
// POST /lists
Route::post('lists', function()
{
	return 'Save list';
});

// Edit list
// GET /lists/$id/edit
Route::get('lists/(:num)/edit', function($id)
{
	return "Edit list #{$id}";
});

// Edit list action
// PUT /lists/$id
Route::put('lists/(:num)', function($id)
{
	return "Save list #{$id}";
});

// Delete list
// GET /lists/$id/delete
Route::get('lists/(:num)/delete', function($id)
{
	return "Delete list #{$id}";
});

// Delete list action
// DELETE /lists/$id
Route::delete('lists/(:num)', function($id)
{
	return "Delete list #{$id}";
});