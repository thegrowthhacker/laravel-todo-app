@layout('layouts.default')

@section('content')
	<h2>{{ $list->name }}</h2>
	
	
	
	<p>
		<strong>{{ HTML::link("lists/{$list->id}/edit", 'Edit list') }}</strong>
		|
		<strong>{{ HTML::link("lists/{$list->id}/delete", 'Delete list') }}</strong>
	</p>
@endsection