<?php

define('ROOT_FILE', __DIR__);

session_start();

require 'vendor/autoload.php';

$settings = require 'app/settings.php';

$app = new \Slim\App($settings);

require 'app/dependencies.php';
require 'app/routes.php';
require 'app/helpers.php';

$app->run();
