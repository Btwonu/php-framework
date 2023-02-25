<?php

namespace Core;

class App {
	protected static $registry = [];

	public static function set($key, $value) {
		static::$registry[$key] = $value;
	}

	public static function get($key) {
		return static::$registry[$key];
	}
}
