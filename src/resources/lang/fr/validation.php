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

    'password'  => "Le :attribut ne correspond pas.",
    'newpassword' => [
        'required' => 'Le nouveau mot de passe est requis',
        'min' => 'Le nouveau mot de passe doit contenir au moins :min caractères',
        'confirmed' => 'La confirmation du mot de passe ne correspond pas',
        'different' => 'Le mot de passe actuel et le nouveau mot de passe doivent être différents'
    ]
];
