<?php

declare(strict_types=1);

use Api\Http\Action;
use Dotenv\Dotenv;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';

if (file_exists(dirname(__DIR__))) {
    $dotenv = Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();
}

(function() {
    $app = AppFactory::create();

    (require '../config/middleware.php')($app);
    (require '../routes/routes.php')($app);

    $app->run();
})();
