<?php

use \core\Router;

Router::add('^car/add$', ['controller' => 'car', 'action' => 'add']);
Router::add('^car/(?P<id>[0-9]+)$', ['controller' => 'car', 'action' => 'show']);
Router::add('^cars$', ['controller' => 'car', 'action' => 'index']);

// default routes
Router::add('^admin$', ['controller' => 'main', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');