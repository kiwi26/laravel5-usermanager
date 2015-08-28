<?php

namespace Kiwi\UserManager\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Auth;
use UserManager;

class PasswordController extends BaseController {

    use DispatchesJobs, ValidatesRequests;

    public function getPassword(){
        return UserManager::getEditPasswordFormView();
    }

    /**
    *
    *   Saves new password and returns to previous page with flash message
    *
    */
    public function postPassword(Request $request){
       
        $this->validateWithBag('password', $request,[
            'password' => 'required|password',
            'newpassword' => 'required|min:6|confirmed|different:password'
        ], [
            'newpassword.required' => trans('kiwi/usermanager::validation.newpassword.required'),
            'newpassword.min' => trans('kiwi/usermanager::validation.newpassword.min'),
            'newpassword.confirmed' => trans('kiwi/usermanager::validation.newpassword.confirmed'),
            'newpassword.different' => trans('kiwi/usermanager::validation.newpassword.different')
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->input('newpassword'));
        $user->save();

        $response = response('', 204);

        if(!$request->ajax()){
            $response = back()->with('user.password.edit.status', trans('kiwi/usermanager::global.password.edit.status'));
        }

        return $response; 
    }
}
