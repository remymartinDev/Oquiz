<?php

require(__DIR__.'/../vendor/autoload.php');

session_start();

use Oquiz\Launcher;

$app = new Launcher();

$app->run();
