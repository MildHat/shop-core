<?php

use \core\Router;

// products
Router::add('^products$', ['controller' => 'product', 'action' => 'index']);

// blog
Router::add('^blog$', ['controller' => 'article', 'action' => 'index']);

// contact
Router::add('^contact$', ['controller' => 'pages', 'action' => 'contact']);

// about
Router::add('^about$', ['controller' => 'pages', 'action' => 'about']);

// main
Router::add('^$', ['controller' => 'pages', 'action' => 'index']);

// default routes
Router::add('^admin$', ['controller' => 'main', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');