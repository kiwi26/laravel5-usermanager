<?php

namespace Kiwi\UserManager\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Kiwi\UserManager\Events\UserRegistered;
use Mail;
use App;

class SendWelcomeMail implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event) {

        $user = $event->user;
        $locale = $event->locale;
        
        Mail::send('kiwi/usermanager::emails.'. $locale .'.welcome', array('user' => $user), function ($message) use ($user) {
            $subject = $user->firstname . ', ' . trans('kiwi/usermanager::emails.welcome.subject');
            $message->to($user->email)->subject($subject);
        });
    }
}
