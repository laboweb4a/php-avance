<?php

include_once '/lib/framework/SplClassLoader.php';

$OCFramLoader = new SplClassLoader('Framework', '/lib');
$OCFramLoader->register();