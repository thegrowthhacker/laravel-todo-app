@layout('layouts.default')

@section('content')
	<h2>Delete List</h2>
	
	<p>Are you sure you want to delete this list <strong>{{ $list->name }}</strong>?</p>
	
	{{ Form::open("lists/{$list->id}", 'DELETE') }}
		{{ Form::token() }}
		<div class="buttons">
			<input type="submit" value="Yes">
			{{ HTML::link("lists/{$list->id}", 'Cancel') }}
		</div>
	{{ Form::close() }}
@endsection