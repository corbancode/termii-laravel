<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API BASE URL
    |--------------------------------------------------------------------------
    |
    | Your Termii account has its own Base URL, which you should use in all
    | API requests. Your base URL can be found on your dashboard.
    | Default: https://api.ng.termii.com
    |
    */
    'api_base_url' => env('TERMII_API_BASE_URL', 'https://api.ng.termii.com'),

    /*
    |--------------------------------------------------------------------------
    | API KEY
    |--------------------------------------------------------------------------
    |
    | This value is the API key of your Termii account. Kindly login to your
    | account on https://termii.com to retrieve your API Key
    |
    */
    'api_key' => env('TERMII_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | SECRET KEY
    |--------------------------------------------------------------------------
    |
    | This value is the Secret key of your Termii account. Kindly login to your
    | account on https://termii.com to retrieve your Secret Key
    |
    */
    'secret_key' => env('TERMII_SECRET_KEY'),

    /*
    |--------------------------------------------------------------------------
    | REQUEST TIMEOUT
    |--------------------------------------------------------------------------
    |
    | This controls how long a request to Termii's API should take before it
    | timeout.
    |
    */
    'request_timeout' => env('TERMII_REQUEST_TIMEOUT', 120),

    'sms_from' => env('TERMII_SMS_FROM'),

    'sms_channel' => env('TERMII_SMS_CHANNEL', 'generic')
];
