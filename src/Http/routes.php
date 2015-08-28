<?php

Route::group(['middleware' => 'auth'],
	function(){

		// Password routes

		Route::post('user/password', array('as' => 'kiwi.usermanager.password', 'uses' => 'PasswordController@postPassword'));
		Route::get('user/password',  array('as' => 'kiwi.usermanager.password', 'uses' => 'PasswordController@getPassword'));

		// Profile routes

		Route::get('user/profile',  array('as' => 'kiwi.usermanager.profile', 'uses' => 'ProfileController@getProfile'));
		Route::post('user/profile',  array('as' => 'kiwi.usermanager.profile', 'uses' => 'ProfileController@postProfile'));

		// Logout route
		Route::get('user/logout', array('as' => 'kiwi.usermanager.logout', 'uses' => 'AuthController@getLogout'));
	}
);

Route::group(['middleware' => 'guest'],
	function(){
		// Reset password routes
		Route::get('/password/email',  array('as' => 'kiwi.usermanager.password.email', 'uses' => 'ResetPasswordController@getEmail'));
		Route::post('/password/email', array('as' => 'kiwi.usermanager.password.email', 'uses' => 'ResetPasswordController@postEmail'));

		Route::get('/password/reset/{token}',  array('as' => 'kiwi.usermanager.password.reset.get', 'uses' => 'ResetPasswordController@getReset'));
		Route::post('/password/reset', array('as' => 'kiwi.usermanager.password.reset.post', 'uses' => 'ResetPasswordController@postReset'));

		// Authentication routes...
		Route::post('user/login', array('as' => 'kiwi.usermanager.login', 'uses' => 'AuthController@postLogin'));

		// Registration routes...
		Route::post('user/register', array('as' => 'kiwi.usermanager.register', 'uses' => 'AuthController@postRegister'));
	}
);

