{{-- errors --}}
@if(Session::has('errors'))
	<ul class="errors">
		@foreach(Session::get('errors')->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif

{{-- success --}}
@if(Session::has('success'))
	<div class="success">
		{{ Session::get('success') }}
	</div>
@endif