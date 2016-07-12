<?php
use Cake\Routing\Router;

Router::plugin(
    'AdminManager',
    ['path' => '/admin-manager'],
    function ($routes) {
        $routes->fallbacks('DashedRoute');
        $routes->connect(
            '/',
            ['controller' => 'Dashboard', 'action' => 'index']
        );
        $routes->connect(
            '/users/:id',
            ['controller' => 'Users', 'action' => 'view'],
            ['id' => '\d+', 'pass' => ['id']]
        );
        $routes->connect(
            '/users/:id/edit',
            ['controller' => 'Users', 'action' => 'edit'],
            ['id' => '\d+', 'pass' => ['id']]
        );
        $routes->connect(
            '/users/:id/password',
            ['controller' => 'Users', 'action' => 'edit-password'],
            ['id' => '\d+', 'pass' => ['id']]
        );
        $routes->connect(
            '/users/:id/delete',
            ['controller' => 'Users', 'action' => 'delete'],
            ['id' => '\d+', 'pass' => ['id']]
        );
    }
);
