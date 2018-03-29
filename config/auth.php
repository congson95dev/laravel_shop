<?php

return [

 

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

   

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
         'guests' => [
            'driver' => 'session',
            'provider' => 'guests',
        ],
        'guests-api' => [
            'driver' => 'token',
            'provider' => 'guests',
        ],

    ],



    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
         'guests' => [
            'driver' => 'eloquent',
            'model' => App\Guests::class,
        ],

        
    ],


    'passwords' => [
        'users' => [
            'provider' => 'users',
            //'email' => 'auth.emails.password',
            'table' => 'password_resets',
            'expire' => 60,
        ],
         'guests' => [
            'provider' => 'guests',
            //'email' => 'auth.emails.password',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
