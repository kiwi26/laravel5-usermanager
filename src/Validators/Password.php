<?php

namespace Kiwi\UserManager\Validators;

use Hash;
use Auth;

class Password {
	
	/*
    *   Checks if $value matches current user's password
    */ 
	public function validate($attribute, $value, $parameters){
		return Hash::check($value, Auth::user()->password);
	}	
}