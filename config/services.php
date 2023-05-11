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
        'scheme' => 'https',
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
        'client_id' => '72234830116-eqdms1u36gugrb3quqf9ge6739ateahd.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],


    'facebook' => [
        'client_id' => '227903633206142',
        'client_secret' => 'c11c1862f5a04e2a2d4b94d21b2b3b95',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],



];
