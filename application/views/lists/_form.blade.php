@include('partials.notifications')

@if(empty($list))
	{{ Form::open('lists', 'POST') }}
@else
	{{ Form::open("lists/{$list->id}", 'PUT') }}
@endif
	{{ Form::token() }}
	<div class="fields">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', Input::old('name', @$list->name)) }}
	</div>
	<div class="buttons">
		@if(empty($list))
			<input type="submit" value="Create List">
			{{ HTML::link('lists', 'Cancel') }}
		@else
			<input type="submit" value="Update">
			{{ HTML::link("lists/{$list->id}", 'Cancel') }}
		@endif
	</div>
{{ Form::close() }}