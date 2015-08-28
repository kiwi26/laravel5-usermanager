<?php

namespace Kiwi\UserManager\Http\Middleware;

use Closure;
use Auth;
use Config;
use Kiwi\UserManager\Exceptions\UserManagerException;
use Kiwi\UserManager\Models\User;
use Validator;
use Event;
use Kiwi\UserManager\Events\UserRegistered;

class UserManager
{
    public function __construct() {
    }

    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        /**
        *   Check if User contract has been implemented
        */
        if(isset($user)){

            if(!($user instanceof User)){
                throw new UserManagerException('Your User model must extend Kiwi\UserManager\Models\User');
            }

            /**
            *   Set fields guarded for mass update (ex: do not update email field for existing user)
            */
            $user->setGuardedFieldsForUpdate(Config::get('kiwi.usermanager.fields.update.guarded'));
        }

        return $next($request);
    }
}
