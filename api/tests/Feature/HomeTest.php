<?php

namespace Api\Test\Feature;

class HomeTest extends WebTestCase
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