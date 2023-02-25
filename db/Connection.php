<?php

namespace DB;

class Connection {
	public static function create($config) {
		extract($config);

		$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

		try {
			$pdo = new \PDO($dsn, $user, $password);

			if ($pdo) {
				return $pdo;
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}
