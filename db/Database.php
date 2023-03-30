<?php 

namespace DB;

class Database {
	private $pdo;
	private $allowed_tables = array(
		'projects',
		'users',
		'posts',
	);

	function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function seed() {
		$sql = "CREATE TABLE `posts` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`title` VARCHAR(255) NOT NULL,
			`body` TEXT NOT NULL,
			`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`)
		  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

		  $stmt = $this->pdo->prepare($sql);
		  $stmt->execute();

		  return 'done';
	}

	public function getAll($table) {
		$this->validateTableName($table);

		$sql = "SELECT * FROM $table";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_OBJ);

		return $results;
	}

	public function get($table, $id) {
		$this->validateTableName($table);

		$sql = "SELECT * FROM $table WHERE id = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetch();

		return $result;
	}

	public function create($table, $data) {
		$this->validateTableName($table);

		$columns = implode( ', ', array_keys($data) );
		
		$keys_arr = array_map(function($key) {
			return ":$key";
		}, array_keys($data));

		$placeholders = implode(', ', $keys_arr);

		$sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
		$stmt = $this->pdo->prepare($sql);

		foreach ($data as $key => $value) {
			$stmt->bindValue(":$key", $value);
		}

		$stmt->execute();
		$id = $this->pdo->lastInsertId();

		return $id;
	}

	public function update($table, $id, $data) {
		$this->validateTableName($table);

		$key = array_keys($data);

		$sql = "UPDATE $table SET column = :column WHERE id = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':column', $key);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		$rowCount = $stmt->rowCount();

		return $rowCount;
	}
	
	public function delete($table, $id) {
		$this->validateTableName($table);
		
		$row = $this->get($table, $id);
		$id = $row['id'];

		$stmt = $this->pdo->prepare("DELETE FROM $table WHERE id = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		return "$id was deleted.";
	}

	private function validateTableName($name) {
		if ( !in_array($name, $this->allowed_tables) ) {
			throw new \Exception('Invalid table provided.');
		}
	}
}