<?php

declare(strict_types=1);

namespace Api\Test\Unit\Http\Action;

use Api\Test\Feature\WebTestCase;

class HomeActionTest extends WebTestCase
{
    public function testSuccess(): void
    {
        $request = $this->get('/');

        $response = $this->request($request);

        self::assertEquals(200, $response->getStatusCode());

        $content = (string)$response->getBody();
        self::assertJson($content);

        $data = json_decode($content, true);
        self::assertEquals([
           'name' => 'App Api',
           'version' => '1.0',
        ], $data);
    }
}
