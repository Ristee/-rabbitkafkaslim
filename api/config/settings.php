<?php

use DI\ContainerBuilder;

return function(ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
       'settings' => [
          'doctrine' => [
              'dev_mode' => true,
              'cache_dir' => 'var/cache/doctrine',
              'metadata_dirs' => ['src/Model/User/Entity'],
              'connection' => [
                  'url' => $_ENV['API_DB_URL']
              ]
          ]
       ]
    ]);
};