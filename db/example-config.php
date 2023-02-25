<?php 

$config = array(
	'database' => [
		'host' => 'host',
		'db' => 'db',
		'user' => 'user',
		'password' => 'pass',
		'options' => [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		],
	]
);
