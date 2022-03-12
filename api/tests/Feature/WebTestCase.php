<?php

declare(strict_types=1);

namespace Api\Test\Feature;

use DI\ContainerBuilder;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Psr7\Factory\RequestFactory;

class WebTestCase extends TestCase
{
    protected function app(): App
    {
        $containerBuilder = new ContainerBuilder();
        // some settings
        $container = $containerBuilder->build();

        AppFactory::setContainer($container);
        $app = AppFactory::create();

        // middleware
        $middleware = require __DIR__.'/../../routes/routes.php';
        $middleware($app);

        // routes
        $routes = require __DIR__.'/../../config/middleware.php';
        $routes($app);

        return $app;
    }

    protected function method($method, $uri): RequestInterface
    {
        return (new RequestFactory())->createRequest($method, $uri);
    }

    protected function get($uri): RequestInterface
    {
        return $this->method('GET', $uri);
    }

    protected function request(ServerRequestInterface $request): ResponseInterface
    {
        $response = $this->app()->handle($request);
        $response->getBody()->rewind();

        return $response;
    }
}