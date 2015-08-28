Hello {{$user->firstname}},<br />

Click here to reset your password: {{ route('kiwi.usermanager.password.reset.get', ['token' => $token]) }}
