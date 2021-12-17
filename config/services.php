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
    'facebook' => [
        'client_id' => '652221235796223',  //client face của bạn
        'client_secret' => 'f8440d26bc869e10192d88f37e58b313',  //client app service face của bạn
        'redirect' => 'https://tandung.com/da/car_td/facebook/callback' //callback trả về
    ],
    'google' => [
        'client_id' => '86824091458-hk41p711o5h49dh105ldqt4dpge779o9.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost/da/car_td/google/callback'
    ],


];
