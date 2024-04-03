<?php

use App\Kernel;

require_once 'vendor/autoload_runtime.php'; ##deploy hostgator

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
