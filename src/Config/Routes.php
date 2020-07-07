<?php
/**
 * =============================================================================================
 *  Project: sssm-auth
 *  File: Routes.php
 *  Date: 2020/06/17 15:11
 *  Author: Shoji Ogura <kohenji@sarahsytems.com>
 *  Copyright (c) 2020. Shoji Ogura
 *  This software is released under the MIT License, see LICENSE.txt.
 * =============================================================================================
 */

$routes->group('', ['namespace' => 'Sssm\Auth\Controllers'], function($routes) {
    $routes->add('Auth', 'Auth::index');
    $routes->add('Auth/(:any)', 'Auth::$1');
    $routes->add('Admin/Auth' , 'Admin::index');
    $routes->add('Admin/Auth/(:any)' , 'Admin::$1');
});

