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

    /*Aqui agregas las credenciales de Google*/

    'facebook' => [

        'client_id' => env('CLIENT_FC'),

        'client_secret' => env('CLIENT_SECRET_FC'),

        'redirect' => env('URL_CALLBACK_FC')

    ],

    'twitter' => [

        'client_id' => env('CLIENT_ID_TWITTER'),

        'client_secret' => env('CLIENT_SECRET_TWITTER'),

        'redirect' => env('URL_CALLBACK_TWITTER')

    ],

    'google' => [

        'client_id' => env('CLIENT_GOOGLE'),

        'client_secret' => env('CLIENT_SECRET_GOOGLE'),

        'redirect' => env('URL_CALLBACK_GOOGLE')

    ],

];

