<?php

namespace Kiwi\UserManager\Http\Controllers;

use Illuminate\Foundation\Auth\ResetsPasswords;
use UserManager;
use Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    protected $redirectPath = '/';
    protected $subject;

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

        $this->subject = trans('kiwi/usermanager::emails.reset.subject');
    }

    public function getEmail(){  

      return UserManager::getResetPasswordMailFormView();
    }

    public function getReset($token){

      return UserManager::getResetPasswordResetFormView($token);
    }
}
