<?php
require '../app/start.php';

$app->run();

var_dump($app->auth->username);
