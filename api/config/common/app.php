<?php

use Api\Http\Action\HomeAction;

return [
    Api\Http\Action\HomeAction::class => function() {
        return new HomeAction();
    }
];