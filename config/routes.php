<?php
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::prefix('admin', function (RouteBuilder $routes) {
    $routes->connect('/dashboard', ['controller' => 'Pages', 'action' => 'display']);
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);

    $routes
        ->connect('/settings/edit',
            ['controller' => 'Settings', 'action' => 'edit']
        )->setExtensions(['json']);

    $routes->fallbacks(DashedRoute::class);
});

Router::scope('/', function (RouteBuilder $routes) {


    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display'], ['_name' => 'display']);

    $routes->connect('/p/:slug', ['controller' => 'Pages', 'action' => 'view'])
        ->setPass(['slug']);

    $routes->connect('/about', ['controller' => 'Pages', 'action' => 'about'], ['_name' => 'about']);

    $routes->connect('/sitemap', ['controller' => 'Pages', 'action' => 'sitemap'])
        ->setExtensions(['xml']);

    $routes->connect('/robots', ['controller' => 'Pages', 'action' => 'robots'])
        ->setExtensions(['txt']);

    $routes->fallbacks(DashedRoute::class);
});