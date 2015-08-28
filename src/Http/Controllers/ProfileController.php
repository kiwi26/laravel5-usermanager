<?php

namespace Kiwi\UserManager\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use UserManager;
use Auth;
use Config;
use Event;
use Kiwi\UserManager\Events\UserRegistered as UserRegisteredEvent;

class ProfileController extends BaseController {

    use DispatchesJobs, ValidatesRequests;

    public function getProfile(){

        return UserManager::getProfileFormView();
    }

    public function postProfile(Request $request){

        $rules = Config::get('kiwi.usermanager.validation.profile');

        $this->validateWithBag('profile', $request, $rules);

        $user = Auth::user();

        $user->fill($request->all());
        $user->save();

        $response = response('', 204);

        if(!$request->ajax()){
            $response = back()->with('user.profile.status', trans('kiwi/usermanager::global.profile.status'));
        }

        return $response;
    }
}
