{!! Form::model($user, array('route' => 'kiwi.usermanager.profile', 'method' => 'POST')) !!}
	{!! Form::text('firstname', old('firstname'), array('placeholder' => trans('kiwi/usermanager::global.profile.firstname'))) !!}
	{!! Form::text('lastname', old('lastname'), array('placeholder' => trans('kiwi/usermanager::global.profile.lastname'))) !!}
	{!! Form::email('email', old('email'), array('disabled' => 'disabled')) !!}
	{!! Form::submit(trans('kiwi/usermanager::global.profile.submit')) !!}
{!! Form::close() !!}


@if (count($errors->profile) > 0)
	<ul>
		@foreach ($errors->profile->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif

@if (session('user.profile.status'))
 	{{ session('user.profile.status') }}
@endif
