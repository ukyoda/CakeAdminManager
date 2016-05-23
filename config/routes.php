<?php
use Cake\Routing\Router;

Router::plugin(
    'AdminManager',
    ['path' => '/admin-manager'],
    function ($routes) {
        $routes->fallbacks('DashedRoute');
    }
);
