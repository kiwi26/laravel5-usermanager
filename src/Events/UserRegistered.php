<?php

namespace Kiwi\UserManager\Events;

use Illuminate\Queue\SerializesModels;
use Kiwi\UserManager\Models\User;

class UserRegistered
{
    use SerializesModels;

    public $user;
    public $locale;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, $locale = 'en')
    {
        $this->user = $user;
        $this->locale = $locale;
    }

}
