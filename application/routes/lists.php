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
	$lists = TodoList::where('user_id', '=', Auth::user()->id)->get();
	
	return View::make('lists.index', array(
		'title' => 'My Lists',
		'lists' => $lists,
	));
});

// View list
// GET /lists/$id
Route::get('lists/(:num)', function($id)
{
	$list = TodoList::find($id);
	
	// make sure list exists and belongs to current user
	if( ! $list || $list->is_mine() === false)
	{
		return Event::first('500');
	}
	
	return View::make('lists.view', array(
		'title' => $list->name,
		'list'  => $list,
	));
});

// Create new list
// GET /lists/new
Route::get('lists/new', function()
{
	return View::make('lists.new', array(
		'title' => 'Create New List',
	));
});

// New list action
// POST /lists
Route::post('lists', array('before' => 'csrf', function()
{
	// build the list
	$list = new TodoList;
	$list->name = Input::get('name');
	$list->user_id = Auth::user()->id;
	
	// validate and save
	if(($val = $list->validate()) === true)
	{
		$list->save();
		
		return Redirect::to('lists')->with('success', 'Your list was created!');
	}
	
	// redirect if there were errors
	return Redirect::to('lists/new')->with_errors($val)->with_input();
}));

// Edit list
// GET /lists/$id/edit
Route::get('lists/(:num)/edit', function($id)
{
	$list = TodoList::find($id);
	
	// make sure list exists and belongs to current user
	if( ! $list || $list->is_mine() === false)
	{
		return Event::first('500');
	}
	
	return View::make('lists.edit', array(
		'title' => 'Edit List',
		'list'  => $list,
	));
});

// Edit list action
// PUT /lists/$id
Route::put('lists/(:num)', array('before' => 'csrf', function($id)
{
	// find the list
	$list = TodoList::find($id);
	
	/// make sure list exists and belongs to current user
	if( ! $list || $list->is_mine() === false)
	{
		return Event::first('500');
	}
	
	// update the list
	$list->name = Input::get('name');
	
	// validate and save
	if(($val = $list->validate()) === true)
	{
		$list->save();
		
		return Redirect::to("lists/{$id}")->with('success', 'Your list was updated!');
	}
	
	// redirect if there were errors
	return Redirect::to("lists/{$id}/edit")->with_errors($val)->with_input();
}));

// Delete list
// GET /lists/$id/delete
Route::get('lists/(:num)/delete', function($id)
{
	// find the list
	$list = TodoList::find($id);
	
	/// make sure list exists and belongs to current user
	if( ! $list || $list->is_mine() === false)
	{
		return Event::first('500');
	}
	
	return View::make('lists.delete', array(
		'title' => 'Delete List',
		'list'  => $list,
	));
});

// Delete list action
// DELETE /lists/$id
Route::delete('lists/(:num)', array('before' => 'csrf', function($id)
{
	// find the list
	$list = TodoList::find($id);
	
	/// make sure list exists and belongs to current user
	if( ! $list || $list->is_mine() === false)
	{
		return Event::first('500');
	}
	
	$list->delete();
	
	return Redirect::to('lists')->with('success', 'Your list was deleted.');
}));