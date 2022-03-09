<?php

use Slim\App;

return function(App $app) {
    $app->addRoutingMiddleware();

//$contentLengthMiddleware = new ContentLengthMiddleware();
//$app->addMiddleware($contentLengthMiddleware);

    $app->addErrorMiddleware(
        filter_var($_ENV['APP_DEBUG'], FILTER_VALIDATE_BOOLEAN),
        true,
        true
    );
};