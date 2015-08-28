<?php

namespace Kiwi\UserManager;
use Request;
use View;
use Form;
use Illuminate\Contracts\Auth\Authenticatable;
use Kiwi\UserManager\Contracts\User;
use Kiwi\UserManager\Exceptions\UserManagerException;
use Auth;
use Config;
use Validator;

class UserManager
{
    public function getProfileFormView(){
        return View::make('kiwi/usermanager::profile')->with('user', Auth::user());
    }

    public function getRegisterFormView()
    {
        return View::make('kiwi/usermanager::register');
    }

    public function getLoginFormView() {
        return View::make('kiwi/usermanager::login');
    }

    public function getEditPasswordFormView(){
        return View::make('kiwi/usermanager::password.edit');
    }

    public function getResetPasswordMailFormView(){
        return View::make('kiwi/usermanager::password.email');
    }

    public function getResetPasswordResetFormView($token){
        return View::make('kiwi/usermanager::password.reset', compact('token'));
    }

    public function isNoCaptchaActive(){
      return Config::get('kiwi.usermanager.services.nocaptcha');
    }
}
