@layout('layouts.default')

@section('content')
	<h2>My Lists</h2>
	
	@include('partials.notifications')
	
	@if(count($lists) > 0)
		<ul>
			@foreach($lists as $list)
				<li>{{ HTML::link("lists/{$list->id}", $list->name) }}</li>
			@endforeach
		</ul>
	@else
		<p>You haven't created any lists yet!</p>
	@endif
	
	<p><strong>{{ HTML::link('lists/new', 'Create a new list') }}</strong></p>
@endsection