<?php

require './lib/SplClassLoader.php';

$frameworkLoader = new SplClassLoader('Framework', 'lib');
$frameworkLoader->register();

if (file_exists('./vendor/autoload.php'))
    require './vendor/autoload.php';

$routes_yaml = \Symfony\Component\Yaml\Yaml::parseFile('./config/routes.yml');

$app = new \Framework\Application();