<?php


return [
	'services' => [
		'nocaptcha' => true
	],
	'validation' => [
		'profile' => [
			'firstname' => 'required',
			'lastname' => 'required'
		]
	],
	'fields' => [
		'update' => [
			'guarded' => [
				'email'
			]
		]
	],
	'events' => [
			'Kiwi\UserManager\Events\UserRegistered' => 'Kiwi\UserManager\Listeners\SendWelcomeMail'
	]
];
