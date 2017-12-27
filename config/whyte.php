<?php

return [
    'project' => [
        'name' => env('APP_NAME'),
        'logo' => 'project/images/logo.png',
        'favicon' => 'project/images/favicon.ico',
        'link' => '/',
    ],

    'admin' => [
        'name' => 'Admin',
        'username' => 'admin',
        'password' => '123456',
        'email'    => 'info@whytecreations.com',
        'copyright' => '© 2016 '.env('APP_NAME').' All Rights Reserved.',
        'copyright_link' => '/',
    ],
];
