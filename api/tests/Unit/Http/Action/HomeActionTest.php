<?php

namespace Api\Test\Unit\Http\Action;

use Api\Http\Action\HomeAction;
use PHPUnit\Framework\TestCase;
use Slim\Psr7\Factory\RequestFactory;
use Slim\Psr7\Factory\ResponseFactory;

class HomeActionTest extends TestCase
{
    public function testSuccess(): void
    {
        $action = new HomeAction();
        $request = (new RequestFactory())->createRequest('GET', '/');
        $response = (new ResponseFactory())->createResponse();

        $action->index($request, $response);

        self::assertEquals(200, $response->getStatusCode());
        self::assertJson($content = $response->getBody());

        $data = json_decode($content, true);
        self::assertEquals([
               'name' => 'App Api',
               'version' => '1.0',
        ], $data);
    }
}
