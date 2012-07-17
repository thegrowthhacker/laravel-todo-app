<?php

// ------------------------------------------------------------
// Application Events
// ------------------------------------------------------------

// 404
Event::listen('404', function()
{
	return Response::error('404');
});

// General error
Event::listen('500', function()
{
	return Response::error('500');
});