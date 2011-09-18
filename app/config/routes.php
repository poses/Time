<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */      

    $url_parts    = explode('.', env('HTTP_HOST'));
    
    if(count($url_parts) == 3) {
        App::import('Lib', 'routes/SlugRoute');
        //slugroute sets organization inside params
        Router::connect('/', array('controller' => 'time_clocks', 'action' => 'index'), array('routeClass' => 'SlugRoute'));
        Router::connect('/manage', array('controller' => 'time_clocks', 'action' => 'index', 'prefix' => 'manage', 'manage' => true), array('routeClass' => 'SlugRoute'));
        Router::connect('/manage/:controller', array('action' => 'index', 'prefix' => 'manage', 'manage' => true), array('routeClass' => 'SlugRoute'));
        Router::connect('/manage/:controller/:action', array('prefix' => 'manage', 'manage' => true), array('routeClass' => 'SlugRoute'));
        Router::connect('/manage/:controller/:action/*', array('prefix' => 'manage', 'manage' => true), array('routeClass' => 'SlugRoute'));

        Router::connect('/admin/:controller', array('action' => 'index', 'prefix' => 'admin', 'admin' => true), array('routeClass' => 'SlugRoute'));
        Router::connect('/admin/:controller/:action', array('prefix' => 'admin', 'admin' => true), array('routeClass' => 'SlugRoute'));
        Router::connect('/admin/:controller/:action/*', array('prefix' => 'admin', 'admin' => true), array('routeClass' => 'SlugRoute'));
        
        Router::connect('/:controller', array('action' => 'index'), array('routeClass' => 'SlugRoute'));
        Router::connect('/:controller/:action', array(), array('routeClass' => 'SlugRoute'));
        Router::connect('/:controller/:action/*', array(), array('routeClass' => 'SlugRoute'));
    }	
    
    Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));

	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

    Router::connect('/admin', array('controller' => 'time_clocks', 'action' => 'index', 'prefix' => 'admin', 'admin' => true));
    Router::connect('/admin/:controller', array('action' => 'index', 'prefix' => 'admin', 'admin' => true));
    Router::connect('/admin/:controller/:action', array('prefix' => 'admin', 'admin' => true));
    Router::connect('/admin/:controller/:action/*', array('prefix' => 'admin', 'admin' => true));
