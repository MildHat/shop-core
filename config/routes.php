<?php

use \core\Router;


// auth
Router::add('^register$', ['controller' => 'auth', 'action' => 'register']);
Router::add('^login$', ['controller' => 'auth', 'action' => 'login']);

// products
Router::add('^product/(?P<id>[0-9]+)$', ['controller' => 'product', 'action' => 'show']);
Router::add('^shop/?(?P<page>[0-9]+)?$', ['controller' => 'product', 'action' => 'index']);

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