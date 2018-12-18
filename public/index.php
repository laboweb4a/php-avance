<?php

require './lib/SplClassLoader.php';

$frameworkLoader = new SplClassLoader('Framework', 'lib');
$frameworkLoader->register();

$appLoader = new SplClassLoader('Controller', 'App');
$appLoader->register();
if (file_exists('./vendor/autoload.php'))
    require './vendor/autoload.php';



$app = new \Framework\Application('Application');
$app->run();