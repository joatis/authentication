<?php

use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

use Noodlehaus\Config;
use RandomLib\Factory as RandomLib;

use Joatis3\User\User;
use Joatis3\Mail\Mailer;
use Joatis3\Helpers\Hash;
use Joatis3\Validation\Validator;


use Joatis3\Middleware\BeforeMiddleware;

session_cache_limiter(false);
session_start();


ini_set('display_errors', 'On');

define('INC_ROOT', dirname(__DIR__));

require INC_ROOT . '/vendor/autoload.php';

$app = new Slim([
  // Some editors will append a newline so that's why the rtrim is here.
  'mode' => rtrim(file_get_contents(INC_ROOT . '/mode.php')),
  'view' => new Twig(),
  'templates.path' => INC_ROOT . '\app\views'
]);

/*
Register the middleware that will be executed before each request
*/
$app->add( new BeforeMiddleware);

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
require 'routes.php';

$app->auth = false;

$app->container->set('user', function() {
  return new User;
});

/*
Load the Hash class as a singleton since it won't be changing.
The Hash class gives us methods to create passwords, verify them, etc.
and use the configuration options we set for them.
*/
$app->container->singleton('hash', function() use ($app){
  return new Hash($app->config);
});

$app->container->singleton('mail', function() use ($app){
  $mailer = new PHPMailer;

  $mailer->Host = $app->config->get('mail.host');
  $mailer->SMTPAuth = $app->config->get('mail.smtp_auth');
  $mailer->SMTPSecure = $app->config->get('mail.smtp_secure');
  $mailer->Port = $app->config->get('mail.port');
  $mailer->Username = $app->config->get('mail.username');
  $mailer->Password = $app->config->get('mail.password');

  $mailer->isHTML($app->config->get('mail.html'));
  // $mailer->isSMTP();
  // Return mailer object
  return new Mailer($app->view, $mailer);
});

$app->container->singleton('validation', function() use ($app) {
  return new Validator($app->user);
});

$app->container->singleton('randomlib', function() {
  $factory = new RandomLib;
  return $factory->getMediumStrengthGenerator();
});

$view = $app->view();

$view->parserOptions = [
  'debug' => $app->config->get('twig.debug')
];

$view->parserExtensions = [
  new TwigExtension
];
