{!! Form::open(array('route' => 'kiwi.usermanager.password.email', 'method' => 'POST')) !!}
  {!! Form::email('email', '', array('placeholder' => trans('kiwi/usermanager::global.password.email.email'), 'required' => 'required')) !!}
  {!! Form::submit(trans('kiwi/usermanager::global.password.email.submit')) !!}
{!! Form::close() !!}

@if (session('status'))
        {{ session('status') }}
@endif



@if (count($errors) > 0)
  @foreach($errors->all() as $e)
    {{$e}}
  @endforeach
@endif
