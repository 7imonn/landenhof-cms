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

        'default' => [
            'name' => 'Deutsch',
            'lang' => 'de',
            'locale' => 'de',
            'url' => config('app.frontend_url'),
        ],
        "de-plain" => [
            'name' => 'Deutsch - Einfache Sprache',
            'locale' => 'de',
            'url' => config('app.frontend_url') . '/plain',
        ],

    ],
];
