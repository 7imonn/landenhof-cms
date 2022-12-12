<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Sites
    |--------------------------------------------------------------------------
    |
    | Each site should have root URL that is either relative or absolute. Sites
    | are typically used for localization (eg. English/French) but may also
    | be used for related content (eg. different franchise locations).
    |
    */

    'sites' => [

        'de' => [
            'name' => 'Deutsch',
            'lang' => 'de',
            'locale' => 'de',
            'url' => env('FRONTEND_URL'),
        ],

        'fr' => [
            'name' => 'Französisch',
            'locale' => 'fr',
            'url' => env('FRONTEND_URL').'/fr/',
        ],

        'it' => [
            'name' => 'Italienisch',
            'locale' => 'it',
            'url' => env('FRONTEND_URL').'/it/',
        ],

    ],
];
