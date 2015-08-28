Bonjour {{$user->firstname}},<br />

Clique ici pour redéfinir ton mot de passe {{ route('kiwi.usermanager.password.reset.get', ['token' => $token]) }}
