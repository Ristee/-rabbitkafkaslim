<?php

declare(strict_types=1);

use Api\Http\Action;
use Slim\Factory\AppFactory;
use Symfony\Component\Dotenv\Dotenv;

require '../vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load(dirname(__DIR__).'/.env');


$app = AppFactory::create();

$app->addRoutingMiddleware();

//$contentLengthMiddleware = new ContentLengthMiddleware();
//$app->addMiddleware($contentLengthMiddleware);

$app->addErrorMiddleware((bool)$_ENV['APP_DEBUG'], true, true);

$app->get('/', [Action\HomeAction::class, 'index']);

$app->run();
