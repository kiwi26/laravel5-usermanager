{!! Form::open(array('route' => 'kiwi.usermanager.password', 'method' => 'POST')) !!}
	{!! Form::password('password', array('placeholder' => trans('kiwi/usermanager::global.password.edit.password'))) !!}
	{!! Form::password('newpassword', array('placeholder' => trans('kiwi/usermanager::global.password.edit.newpassword'))) !!}
	{!! Form::password('newpassword_confirmation', array('placeholder' => trans('kiwi/usermanager::global.password.edit.newpassword_confirmation'))) !!}
	{!! Form::submit(trans('kiwi/usermanager::global.password.edit.submit')) !!}
{!! Form::close() !!}

@if (count($errors->password) > 0)
	<ul>
		@foreach ($errors->password->all() as $error)
			<li>{{ $error }}</li>	
		@endforeach
	</ul>
@endif
@if (session('user.password.edit.status'))
 	{{ session('user.password.edit.status') }}
@endif