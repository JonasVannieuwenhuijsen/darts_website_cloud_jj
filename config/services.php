<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '1062925670136-mrhe18bitfab0en36p9ktffkqn1fm39i.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/google/callback',
    ],

    'facebook' => [
        'client_id' => '436772921281222',
        'client_secret' => '704db3997b580d1df89ee3f6f46e0dd9',
        'redirect' => 'http://localhost:8000/facebook/callback',
    ],

    'github' => [
        'client_id' => 'edc0fb112d15ba5100f6',
        'client_secret' => '445edd71ce5cd3a1b2d2b206eabd1e605f263504',
        'redirect' => 'http://localhost:8000/github/callback',
    ],


    // 'google' => [
    //     'client_id' => '1062925670136-mrhe18bitfab0en36p9ktffkqn1fm39i.apps.googleusercontent.com',
    //     'client_secret' => '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',
    //     'redirect' => 'http://dartscloud.herokuapp.com/google/callback',
    // ],

    // 'facebook' => [
    //     'client_id' => '436772921281222',
    //     'client_secret' => '704db3997b580d1df89ee3f6f46e0dd9',
    //     'redirect' => 'http://dartscloud.herokuapp.com/facebook/callback',
    // ],

    // 'github' => [
    //     'client_id' => 'edc0fb112d15ba5100f6',
    //     'client_secret' => '445edd71ce5cd3a1b2d2b206eabd1e605f263504',
    //     'redirect' => 'http://dartscloud.herokuapp.com/github/callback',
    // ],

];
