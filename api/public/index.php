<?php

declare(strict_types=1);

use Api\Http\Action;
use Dotenv\Dotenv;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$app = AppFactory::create();

$app->addRoutingMiddleware();

//$contentLengthMiddleware = new ContentLengthMiddleware();
//$app->addMiddleware($contentLengthMiddleware);

$app->addErrorMiddleware(
    filter_var($_ENV['APP_DEBUG'], FILTER_VALIDATE_BOOLEAN),
    true,
    true
);

$app->get('/', [Action\HomeAction::class, 'index1']);

$app->run();
