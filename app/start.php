<?php

use Slim\Slim;

session_cache_limiter(false);
session_start();


ini_set('display_errors', 'On');

define('INC_ROOT', dirname(__DIR__));

require INC_ROOT . '/vendor/autoload.php';

$app = new Slim();

$app->get('/test/:name', function($name){
  echo "Hello {$name}";
});
