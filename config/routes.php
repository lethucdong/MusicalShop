<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
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

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * This file is loaded in the context of the `Application` class.
  * So you can use  `$this` to reference the application class instance
  * if required.
 */
return function (RouteBuilder $routes): void {
    /*
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
     * inconsistently cased URLs when used with `{plugin}`, `{controller}` and
     * `{action}` markers.
     */
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        /*
         * Here, we are connecting '/' (base path) to a controller called 'Pages',
         * its action called 'display', and we pass a param to select the view file
         * to use (in this case, templates/Pages/home.php)...
         */
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        $builder->connect('/Users', ['controller' => 'Users', 'action' => 'index']);
        $builder->connect('/Roles', ['controller' => 'Roles', 'action' => 'index']);
        $builder->connect('/RolePermissions', ['controller' => 'RolePermissions', 'action' => 'index']);
        $builder->connect('/Properties', ['controller' => 'Properties', 'action' => 'index']);
        $builder->connect('/Products', ['controller' => 'Products', 'action' => 'index']);
        $builder->connect('/Permissions', ['controller' => 'Permissions', 'action' => 'index']);
        $builder->connect('/OrderDetails', ['controller' => 'OrderDetails', 'action' => 'index']);
        $builder->connect('/ImageProducts', ['controller' => 'ImageProducts', 'action' => 'index']);
        $builder->connect('/ImageBanners', ['controller' => 'ImageBanners', 'action' => 'index']);
        $builder->connect('/Orders', ['controller' => 'Orders', 'action' => 'index']);
        $builder->connect('/Categories', ['controller' => 'Categories', 'action' => 'index']);
        $builder->connect('/Carts', ['controller' => 'Carts', 'action' => 'index']);
        $builder->connect('/CartDetails', ['controller' => 'CartDetails', 'action' => 'index']);
        $builder->connect('/Brands', ['controller' => 'Brands', 'action' => 'index']);
        $builder->connect('/AdminUsers', ['controller' => 'AdminUsers', 'action' => 'index']);

        // MyPage
        $builder->connect('/MyPage', ['controller' => 'UserPage', 'action' => 'myPage']);

         // Thông tin khách hàng
        $builder->connect('/CustomerInfo', ['controller' => 'UserPage', 'action' => 'customerInfo']);

        // Thay đổi thông tin khách hàng
        $builder->connect('/CustomerChange', ['controller' => 'UserPage', 'action' => 'customerChange']);

        // Thay đổi mật khẩu
        $builder->connect('/PasswordChange', ['controller' => 'UserPage', 'action' => 'passwordChange']);

        /*
         * ...and connect the rest of 'Pages' controller's URLs.
         */
        $builder->connect('/pages/*', 'Pages::display');

        /*
         * Connect catchall routes for all controllers.
         *
         * The `fallbacks` method is a shortcut for
         *
         * ```
         * $builder->connect('/{controller}', ['action' => 'index']);
         * $builder->connect('/{controller}/{action}/*', []);
         * ```
         *
         * You can remove these routes once you've connected the
         * routes you want in your application.
         */
        $builder->fallbacks();
    });

    /*
     * If you need a different set of middleware or none at all,
     * open new scope and define routes there.
     *
     * ```
     * $routes->scope('/api', function (RouteBuilder $builder): void {
     *     // No $builder->applyMiddleware() here.
     *
     *     // Parse specified extensions from URLs
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // Connect API actions here.
     * });
     * ```
     */
};
