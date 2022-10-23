<?php

final class Database {
	private static string $server = 'localhost';
	private static string $user = 'root';
	private static string $password = '';
	private static string $database = 'spring_code_challenge';
	private PDO $pdo;

	private function __construct(PDO $pdo) {
		$this->pdo = $pdo;
	}

	private static function connectToDatabase(?string $database): PDO {
		if ($database) {
			$database = "dbname=$database";
		}
		$server = Database::$server;
		$user = Database::$user;
		$pass = Database::$password;
		$connection = new PDO("mysql:host=$server;$database", $user, $pass);
		// set the PDO error mode to exception
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $connection;
	}

	public static function connect(): ?Database {
		try {
			$connection = Database::connectToDatabase(Database::$database);
		} catch (PDOException $e) {
			return null;
		}

		return new Database($connection);
	}

	public function getPdo(): PDO {
		return $this->pdo;
	}
}