<?php

// config for Novu/RedirectEntryUri
return [

    /*
    |--------------------------------------------------------------------------
    | Middleware Group
    |--------------------------------------------------------------------------
    |
    | This middleware is used to register the middleware used to redirect uris.
    | Set to null if you want it to be registered globally.
    |
    */
    'middleware-group' => 'web',

    /*
    |--------------------------------------------------------------------------
    | Exceptions
    |--------------------------------------------------------------------------
    |
    | This is a list of URI-patterns used within the middleware
    | to determine whether to ignore the given request.
    |
    */
    'exceptions' => [
        '/horizon*',
        '/',
    ],

];
