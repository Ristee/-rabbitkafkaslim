<?php

return [
    \Slim\App::class => function (\Psr\Container\ContainerInterface $container) {
        \Slim\Factory\AppFactory::create();
    }
];