<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::connect('', ['controller' => 'Users', 'action' => 'login', 'prefix' => 'api']); //need by JWT

Router::plugin(
    'Restful',
    ['path' => '/restful'],
    function (RouteBuilder $routes) {
        $routes->prefix('api', function ($routes) {
            $routes->extensions(['json', 'xml']);
            //$routes->connect('users/register', ['controller' => 'Users', 'action' => 'add', 'prefix' => 'api']);
            $routes->fallbacks(DashedRoute::class);
        });
        $routes->fallbacks(DashedRoute::class);
    }
);
