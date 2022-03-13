<?php

declare(strict_types=1);

use Api\Http\Action;
use DI\Container;
use DI\ContainerBuilder;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Dotenv\Dotenv;
use Psr\Container\ContainerInterface;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';

if (file_exists(dirname(__DIR__))) {
    $dotenv = Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();
}

(function() {
    require __DIR__.'/../config/bootstrap.php';

    $app = AppFactory::create();

    (require '../config/middleware.php')($app);
    (require '../routes/routes.php')($app);

    $app->run();
})();
