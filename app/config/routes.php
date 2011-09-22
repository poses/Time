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
        App::import('Component', 'Session');
        $Session =& new SessionComponent();
        if($Session->check('Auth.User')){
            Router::connect('/', array(
                'controller' => 'time_clocks', 
                'action' => 'index'), 
            array(
                'routeClass' => 'SlugRoute',
            ));
        }
        
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
	
    Router::connect('/admin',array(
	    'controller' => 'admin',
	    'action' => 'index',
	    'prefix' => 'admin',
    ));

    Router::connect('/api/:api_version/:organization_id',array(
	    'controller'=>'organizations',
	    'action'=>'view',
	    'prefix'=>'api',
    ),array(
	    'api_version' => '[0-9]+\.[0-9]+',
	    'organization_id' => '[0-9]+',
    ));
    Router::connect('/api/:api_version/:organization_id/:controller',array(
	    'controller'=>':controller',
	    'action'=>'index',
	    'prefix'=>'api',
    ),array(
	    'api_version' => '[0-9]+\.[0-9]+',
	    'organization_id' => '[0-9]+',
    ));
    Router::connect('/api/:api_version/:organization_id/:controller/:action/*',array(
	    'controller'=>':controller',
	    'action'=>':action',
	    'prefix'=>'api',
    ),array(
	    'api_version' => '[0-9]+\.[0-9]+',
	    'organization_id' => '[0-9]+',
    ));
    
    Router::connect('/o/:organization_slug',array(
	    'controller'=>'organizations',
	    'action'=>'view',
    ));
    Router::connect('/o/:organization_slug/:controller',array(
	    'controller'=>':controller',
	    'action'=>'index',
    ));
    Router::connect('/o/:organization_slug/:controller/:action/*',array(
	    'controller'=>':controller',
	    'action'=>':action',
    ));
    Router::connect('/o/:organization_slug/:controller/:action/:id/*',array(
	    'controller'=>':controller',
	    'action'=>':action',
	    array(
            'pass' => array(
                'id'
            )
	    )
    ));
    Router::connect('/o/:organization_slug/:controller/:action/:id/:page',array(
	    'controller'=>':controller',
	    'action'=>':action',
	    array(
            'pass' => array(
                'id',
                'page'
            )
	    )
    ));
    Router::connect('/manage',array(
	    'controller'=>'organizations',
	    'action'=>'index',
	    'prefix'=>'manage'
    ));
    Router::connect('/manage/:organization_slug',array(
	    'controller'=>'organizations',
	    'action'=>'index',
	    'prefix'=>'manage'
    ));
    Router::connect('/manage/:organization_slug/:controller',array(
	    'controller'=>':controller',
	    'action'=>'index',
	    'prefix'=>'manage'
    ));
    Router::connect('/manage/:organization_slug/:controller/:action/*',array(
	    'controller'=>':controller',
	    'action'=>':action',
	    'prefix'=>'manage'
    ));


    // Dynamic Routes are handled here
    if(is_array(Configure::read('DynamicRoutes'))) {
	    foreach(Configure::read('DynamicRoutes') as $route) {
		    Router::connect($route['url'],array(
			    'plugin' => $route['plugin_name'],
			    'controller' => $route['controller_name'],
			    'action' => $route['action_name'],
			    $route['extra']
		    ));
	    }
    }

    Router::parseExtensions('json','xml','jsonp', 'rss');

    // Grab Routing information from plugins
    foreach(array_merge(glob('../plugins/*/config/routes.php'),glob('../../plugins/*/config/routes.php')) as $uri) {
	    require $uri;
    }
	/*
    Router::connect('/admin', array('controller' => 'time_clocks', 'action' => 'index', 'prefix' => 'admin', 'admin' => true));
    Router::connect('/admin/:controller', array('action' => 'index', 'prefix' => 'admin', 'admin' => true));
    Router::connect('/admin/:controller/:action', array('prefix' => 'admin', 'admin' => true));
    Router::connect('/admin/:controller/:action/*', array('prefix' => 'admin', 'admin' => true));
    */
