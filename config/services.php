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
        'client_id' => '519432288902-mt133rmbrucumh0b9vbhdueim84dj120.apps.googleusercontent.com',
        'client_secret' => 'CzvnP2BOS6AWabRqbrBFzGLj',
        'redirect' => 'http://localhost/ecommerce/callback/google',
    ],

    // 'facebook' => [
    //     'client_id' => 'xxxx',
    //     'client_secret' => 'xxx',
    //     'redirect' => 'http://localhost/ecommerce/callback/facebook',
    // ],

];
