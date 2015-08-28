<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'password'             => "The current :attribute does not match",
    'newpassword' => [
        'required' => 'The new password is required',
        'min' => 'The new password must contain at least :min characters',
        'confirmed' => 'The new password confirmation does not match',
        'different' => 'The password and new password must be different'
    ]
];
