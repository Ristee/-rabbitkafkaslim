<?php

namespace Api\Http\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeAction
{
    public function index(ServerRequestInterface $request, ResponseInterface $response)
    {
            $data = [
                'name' => 'App Api',
                'version' => '1.0',
            ];

            $response->getBody()
                     ->write(json_encode($data));

            return $response->withHeader('Content-Type', 'application/json');
    }

}