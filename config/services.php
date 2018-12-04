<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain'   => env('MAILGUN_DOMAIN'),
        'secret'   => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model'   => App\User::class,
        'key'     => env('STRIPE_KEY'),
        'secret'  => env('STRIPE_SECRET'),
        'webhook' => [
            'secret'    => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'github' => [
        'client_id'     => settings('oauth_github_client', env('GITHUB_CLIENT')),
        'client_secret' => settings('oauth_github_secret', env('GITHUB_SECRET')),
        'redirect'      => config('app.url').'/auth/github/callback',
    ],

    'google' => [
        'client_id'     => settings('oauth_google_client', env('GOOGLE_CLIENT')),
        'client_secret' => settings('oauth_google_secret', env('GOOGLE_SECRET')),
        'redirect'      => config('app.url').'/auth/google/callback',
    ],

    'facebook' => [
        'client_id'     => settings('oauth_facebook_client', env('FACEBOOK_CLIENT')),
        'client_secret' => settings('oauth_facebook_secret', env('FACEBOOK_SECRET')),
        'redirect'      => config('app.url').'/auth/facebook/callback',
    ],

    'twitter' => [
        'client_id'     => settings('oauth_twitter_client', env('TWITTER_CLIENT')),
        'client_secret' => settings('oauth_twitter_secret', env('TWITTER_SECRET')),
        'redirect'      => config('app.url').'/auth/twitter/callback',
    ],
];
