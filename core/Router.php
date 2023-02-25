<?php 

namespace Core;

class Router {
	protected $routes = [
		'GET' => [],
		'POST' => [],
	];

	public static function load($file) {
		$router = new static;

		require $file;

		return $router;
	}

	public function get($uri, $controller) {
		$this->routes['GET'][BASE_URL . $uri] = $controller;
	}

	public function post($uri, $controller) {
		$this->routes['POST'][BASE_URL . $uri] = $controller;	
	}

	public function getRoutes() {
		return $this->routes;
	}

	public function map_uri($uri, $method) {
		if (! array_key_exists($uri, $this->routes[$method]) ) {
			return view('404');
		}

		return $this->callAction(
			...explode('@', $this->routes[$method][$uri])
		);
	}

	protected function callAction($controller, $action) {
		$class = "Controllers\\" . $controller;

		if (! method_exists($class, $action)) {
			throw new \Exception("{$controller} does not support {$action}.");
		}

		return (new $class)->$action();
	}
}
