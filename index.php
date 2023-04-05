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

class Property {
	public $seeMe = 'Hello';
}

class Test {
	protected Property $property;

	public function __construct(Property $property) {
		$this->property = $property;
	}

	public function getProperty() {
		return $this->property;
	}
}

// $test = new Test(
// 	new Property()
// );

// echo '<pre>';
// 	die(var_dump( $test->getProperty() ));
// echo '</pre>';

$container = new Container;

$container->set( Test::class, function($c) {
	return new Test(
		new Property()
	);
} );

echo '<pre>';
	die(var_dump( $container->get( Test::class )->getProperty()));
echo '</pre>';