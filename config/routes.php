<?php

use \core\Router;


// order
Router::add('^checkout$', ['controller' => 'order']);

// auth
Router::add('^register$', ['controller' => 'auth', 'action' => 'register']);
Router::add('^login$', ['controller' => 'auth', 'action' => 'login']);

// search
Router::add('^search$', ['controller' => 'product', 'action' => 'search']);

// brands
Router::add('^brand/(?P<alias>[a-z0-9-]+)$', ['controller' => 'brand', 'action' => 'show']);

// categories
Router::add('^category/(?P<alias>[a-z0-9-]+)$', ['controller' => 'category', 'action' => 'show']);

// products
Router::add('^product/(?P<alias>[a-z0-9-]+)$', ['controller' => 'product', 'action' => 'show']);
Router::add('^products/?((page-)(?P<page>[0-9]+))?$', ['controller' => 'product', 'action' => 'index']);

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