<?php

return [

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
    | STORE NOTIFICATIONS
    |--------------------------------------------------------------------------
    |
    | If you are using Laravel Notifications to send your sms, you can store
    | a copy of your messages to the database. This value determines if
    | a copy would be stored or not.
    |
    */
    'store_notifications' => false,

    /*
    |--------------------------------------------------------------------------
    | REQUEST TIMEOUT
    |--------------------------------------------------------------------------
    |
    | This controls how long a request to Termii's API should take before it
    | timeout.
    |
    */
    'request_timeout' => env('REQUEST_TIMEOUT', 120)
];
