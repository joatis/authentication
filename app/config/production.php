<?php

return [
  'app' => [
      'url' => 'http://localhost/authentication',
      'hash' => [
          'algo' => PASSWORD_BCRYPT,
          'cost' => 10
        ]
    ],
    'db' => [
        'driver' => 'mysql',
        'host'  => '127.0.0.1',
        'username' => 'site',
        'password' => 'root',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => ''
    ],
    'auth' => [
          'session' => 'user_id',
          'remember' => 'user_r',
    ],
    'mail' => [
      'smtp_auth' => true,
      'smtp_secure' => 'tls',
      'host' => 'smtp.gmail.com',
      'username' => 'joatis3@joatis3.com',
      'password' => 'password',
      'port' => 587,
      'html' => true,
    ],
    'twig' => [
      'debug' => true
    ],
    'csrf' => [
      'session' => 'csrf_token'
    ]

  ];
