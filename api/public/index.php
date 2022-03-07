<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

require '../vendor/autoload.php';

$config = [
    'settings' => [
        'addContentLengthHeader' => false,
    ]
];

$app = \Slim\Factory\AppFactory::create();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->get('/', function(ServerRequestInterface $request, ResponseInterface $response) {
    $data = [
        'name' => 'App Api',
        'version' => '1.0',
    ];

    $response = $response
        ->withHeader('Content-Type', 'application/json');

    $response->getBody()
        ->write(json_encode($data));

    return $response;
});

$app->run();