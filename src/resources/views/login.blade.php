{!! Form::open(array('route' => 'kiwi.usermanager.login', 'method' => 'POST')) !!}
	{!! Form::email('email', '', array('placeholder' => trans('kiwi/usermanager::global.login.email'))) !!}
	{!! Form::password('password', array('placeholder' => trans('kiwi/usermanager::global.login.password'))) !!}
	{!! Form::submit(trans('kiwi/usermanager::global.login.submit')) !!}
{!! Form::close() !!}