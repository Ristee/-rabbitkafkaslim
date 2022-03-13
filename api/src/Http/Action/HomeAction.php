<?php

namespace Api\Http\Action;

use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

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