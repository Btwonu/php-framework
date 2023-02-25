<?php 

namespace DB;

class QueryBuilder {
	protected $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function getAll($table) {
		$statement = $this->pdo->prepare("select * from {$table}");
		$statement->execute();

		return $statement->fetchAll(\PDO::FETCH_CLASS);
	}

	public function insert($table, $values) {
		$query = "INSERT INTO {$table} (title, body) VALUES (:title, :body)";

		$statement = $this->pdo->prepare($query);
		$statement->execute($values);
	}
}

// INSERT INTO `posts` (`id`, `title`, `body`) VALUES ('1', 'Heading', 'Some text');
