{!! Form::open(array('route' => 'kiwi.usermanager.password.reset.post', 'method' => 'POST')) !!}
	{!! Form::hidden('token', $token) !!}
	{!! Form::email('email', old('email'), ['placeholder' => trans('kiwi/usermanager::global.password.reset.email')]) !!}
	{!! Form::password('password', ['placeholder' => trans('kiwi/usermanager::global.password.reset.password')]) !!}
	{!! Form::password('password_confirmation', ['placeholder' => trans('kiwi/usermanager::global.password.reset.password_confirmation')]) !!}
	{!! Form::submit(trans('kiwi/usermanager::global.password.reset.submit')) !!}
{!! Form::close() !!}

@if (count($errors) > 0)
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>	
		@endforeach
	</ul>
@endif