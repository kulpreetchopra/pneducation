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
        'client_id' => '750436432109-or9i9h6ggpae6k0bda8380qntrslih8g.apps.googleusercontent.com',
        'client_secret' => '1U-WArArwFDbifdhJFfjSqMi',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',
    ],

    'facebook' => [
    'client_id' => '319527172942148',
    'client_secret' => '6712a444ef3625613950cf8317371c96',
    'redirect' => 'http://127.0.0.1:8000/auth/facebook/callback',
    ],

    'linkedin' => [
    'client_id' => '86vrk4sripbzll',
    'client_secret' => '2dGmRvR3o7g44DhU',
    'redirect' => 'http://127.0.0.1:8000/auth/linkedin/callback',
    ],

];
