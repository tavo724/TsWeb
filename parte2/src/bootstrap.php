<?php

if (!defined('APP_ROOT')) {
    $spl = new SplFileInfo(__DIR__.'/..');
    define('APP_ROOT', $spl->getRealPath());
}


require_once APP_ROOT.'/vendor/autoload.php';
require_once APP_ROOT.'/src/App/Controller/EmployeeController.php';
require_once APP_ROOT.'/src/dependencies.php';
require_once APP_ROOT.'/src/middleware.php';
require_once APP_ROOT.'/src/routes.php';

$settings = require APP_ROOT.'/src/settings.php';
$app      = new \Slim\App($settings);
