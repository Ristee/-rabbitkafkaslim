<?php

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

require __DIR__.'/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();

$settings = require __DIR__.'/settings.php';
$settings($containerBuilder);

$dependencies = require __DIR__.'/dependencies.php';
$dependencies($containerBuilder);

$container = $containerBuilder->build();

AppFactory::setContainer($container);
