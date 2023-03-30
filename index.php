<?php 

require 'vendor/autoload.php';
require 'bootstrap.php';

use Core\Container;
use Core\Router;

Router::load('routes.php')
	->map_uri( $_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'] );

function view($name, $ctx = []) {
	extract($ctx);

	require("views/{$name}.view.php");
}

$c = new Container;
echo '<pre>';
	die(var_dump( $c->get('single') ));
echo '</pre>';