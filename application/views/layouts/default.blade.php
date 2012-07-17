<!doctype html>

<html lang="en">

<head>
	<!-- meta -->
	<meta charset="utf-8">
	<title>{{ $title }} :: {{ __('app.site_name') }}</title>
	
	<!-- css -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	@yield('css')
</head>

<body>
	<!-- page header -->
	<header id="page-header">
		<h1>TODO Application</h1>
	</header>
	
	<!-- main content -->
	<div id="content">
		@yield('content')
	</div>
	
	<!-- page footer -->
	<footer id="page-footer">
		&copy; {{ date('Y') }} {{ __('app.site_name') }}. Built with <a href="http://laravel.com/">Laravel</a>.
	</footer>
	
	<!-- javascript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	@yield('javascript')
</body>

</html>