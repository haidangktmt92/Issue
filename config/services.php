<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
    'client_id' => '1009830699077322',
    'client_secret' => '3a39e11db874e43671375c19f790ac98',
    'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'google' => [
    'client_id' => '129264081052-gkvoe4vkmnpeatcobnpshfaqfnu2034g.apps.googleusercontent.com',
    'client_secret' => '53LXaZil7qHGdTB30i21fkqL',
    'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

    'twitter' => [
    'client_id' => 'BUMjaFy6QpBsndEE4WOm2f8oM',
    'client_secret' => 'L3EV2ouv4jleawbeaI83Ce7fMNCe3mbVMw2PwV8msph6vcpFtg',
    'redirect' => 'http://localhost:8000/auth/twitter/callback',
    ],

];
