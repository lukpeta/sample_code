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

    'inpost' => [
        'size_1_height' => env('INPOST_SIZE_A_HEIGHT'),
        'size_1_lenght' => env('INPOST_SIZE_A_LENGHT'),
        'size_1_width' => env('INPOST_SIZE_A_WIDTH'),

        'size_2_height' => env('INPOST_SIZE_B_HEIGHT'),
        'size_2_lenght' => env('INPOST_SIZE_B_LENGHT'),
        'size_2_width' => env('INPOST_SIZE_B_WIDTH'),

        'size_3_height' => env('INPOST_SIZE_C_HEIGHT'),
        'size_3_lenght' => env('INPOST_SIZE_C_LENGHT'),
        'size_3_width' => env('INPOST_SIZE_C_WIDTH'),
    ]

];
