{!! Form::open(array('route' => 'kiwi.usermanager.register', 'method' => 'POST')) !!}
	{!! Form::text('firstname', '', array('placeholder' => trans('kiwi/usermanager::global.register.firstname'))) !!}
	{!! Form::text('lastname', '', array('placeholder' => trans('kiwi/usermanager::global.register.lastname'))) !!}
	{!! Form::email('email', '', array('placeholder' => trans('kiwi/usermanager::global.register.email'))) !!}
	{!! Form::password('password', array('placeholder' => trans('kiwi/usermanager::global.register.password'))) !!}
	{!! Form::password('password_confirmation', array('placeholder' => trans('kiwi/usermanager::global.register.password_confirmation'))) !!}

	@if(UserManager::isNoCaptchaActive())
		{!! app('captcha')->display(); !!}
	@endif
	{!! Form::submit(trans('kiwi/usermanager::global.register.submit')) !!}
{!! Form::close() !!}
