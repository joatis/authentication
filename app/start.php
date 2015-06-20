<?php

use Slim\Slim;
use Noodlehaus\Config;

session_cache_limiter(false);
session_start();


ini_set('display_errors', 'On');

define('INC_ROOT', dirname(__DIR__));

require INC_ROOT . '/vendor/autoload.php';

$app = new Slim([
  // Some editors will append a newline so that's why the rtrim is here.
  'mode' => rtrim(file_get_contents(INC_ROOT . '/mode.php'))
]);


/*
How to access configuration options
$app->config->get('db.driver');
*/
$app->configureMode($app->config('mode'), function() use ($app) {
  $app->config = Config::load(INC_ROOT . "/app/config/{$app->mode}.php");
});

/*
Require the database.php file because that is the file
that will allow us to use Laravel's Eloquent Data models.
*/
require 'database.php';
