@layout('layouts.default')

@section('content')
	<h2>Login</h2>
	
	@include('partials.notifications')
	
	{{ Form::open() }}
		<div class="fields">
			{{ Form::label('email', 'Email address') }}
			{{ Form::text('email', Input::old('email')) }}
		</div>
		<div class="fields">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</div>
		<div class="fields">
			<label class="checkbox">
				{{ Form::checkbox('remember', 'y', Input::had('remember')) }}
				Keep me logged in
			</label>
		</div>
		<div class="buttons">
			<input type="submit" value="Login">
		</div>
	{{ Form::close() }}
@endsection