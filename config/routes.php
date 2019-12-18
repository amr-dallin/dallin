<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::prefix('admin', function (RouteBuilder $routes) {
    $routes->connect(
        '/dashboard',
        ['controller' => 'SystemicPages', 'action' => 'dashboard'],
        ['_name' => 'dashboard']
    );

    $routes
        ->connect(
            '/tag-list',
            ['controller' => 'Posts', 'action' => 'tagList'],
            ['_name' => 'tag-list']
        )
        ->setExtensions(['json']);

    $routes->connect(
        '/login',
        ['controller' => 'Users', 'action' => 'login'],
        ['_name' => 'login']
    );
    $routes->connect(
        '/logout',
        ['controller' => 'Users', 'action' => 'logout'],
        ['_name' => 'logout']
    );

    $routes
        ->connect(
            '/settings/key/:key',
            ['controller' => 'Settings', 'action' => 'index'],
            ['_name' => 'settings']
        )
        ->setPass(['key']);

    $routes
        ->connect(
            '/settings/edit',
            ['controller' => 'Settings', 'action' => 'edit']
        )
        ->setExtensions(['json']);

    $routes->fallbacks(DashedRoute::class);
});

Router::scope('/', function (RouteBuilder $routes) {

    // Posts
    $routes
        ->connect(
            '/posts',
            ['controller' => 'Posts', 'action' => 'index'],
            ['_name' => 'posts']
        )
        ->setPass(['slug']);
    $routes
        ->connect(
            '/posts/c/:service_slug',
            ['controller' => 'Posts', 'action' => 'service'],
            ['_name' => 'posts_service']
        )
        ->setPass(['service_slug']);
    $routes
        ->connect(
            '/posts/tag/:tag_slug',
            ['controller' => 'Posts', 'action' => 'tag'],
            ['_name' => 'posts_tag']
        )
        ->setPass(['tag_slug']);
    $routes
        ->connect(
            '/posts/:slug',
            ['controller' => 'Posts', 'action' => 'view'],
            ['_name' => 'post_view']
        )
        ->setPass(['slug']);

    // Services
    $routes
        ->connect(
            '/s/:slug',
            ['controller' => 'Services', 'action' => 'view'],
            ['_name' => 'service_view']
        )
        ->setPass(['slug']);

    // Projects
    $routes
        ->connect(
            '/projects',
            ['controller' => 'Projects', 'action' => 'index'],
            ['_name' => 'projects']
        )
        ->setPass(['slug']);
    $routes
        ->connect(
            '/projects/:slug',
            ['controller' => 'Projects', 'action' => 'view'],
            ['_name' => 'project_view']
        )
        ->setPass(['slug']);

    $routes
        ->connect(
            '/p/:slug',
            ['controller' => 'Pages', 'action' => 'view'],
            ['_name' => 'page_view']
        )
        ->setPass(['slug']);

    $routes->connect(
        '/',
        ['controller' => 'SystemicPages', 'action' => 'display'],
        ['_name' => 'home']
    );

    $routes
        ->connect(
            '/sitemap',
            ['controller' => 'SystemicPages', 'action' => 'sitemap'],
            ['_name' => 'sitemap']
        )
        ->setExtensions(['xml']);

    $routes
        ->connect(
            '/robots',
            ['controller' => 'SystemicPages', 'action' => 'robots'],
            ['_name' => 'robots']
        )
        ->setExtensions(['txt']);

    $routes->fallbacks(DashedRoute::class);
});