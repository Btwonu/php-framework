<?php 

require 'vendor/autoload.php';
require 'bootstrap.php';

use Core\Router;

Router::load('routes.php')
	->map_uri( $_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'] );

function view($name, $ctx = []) {
	extract($ctx);

	require("views/{$name}.view.php");
}
