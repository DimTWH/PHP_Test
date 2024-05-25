<?php

class DB
{
	/**
	 * Initialize properties.
	 */
	private $pdo;
	private static $instance = null;

	/**
	 * Initializes the database connection.
	 * This method constructs the Data Source Name (DSN), username, and password
	 * from environment variables and establishes a connection to the database.
	 * It ensures that only one instance of the database connection is created,
	 * adhering to the Singleton pattern.
	 *
	 * @throws PDOException If there is an issue connecting to the database.
	 */
	private function __construct()
	{
		try {
			$dsn = $_ENV["DB_DRIVER"] . ":dbname=" . $_ENV["DB_NAME"] . ";host=" . $_ENV["DB_HOST"];
			$user = $_ENV["DB_USERNAME"];
			$password = $_ENV["DB_PASSWORD"];

			$this->pdo = new PDO($dsn, $user, $password);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			throw new PDOException("Connection failed: " . $e->getMessage(), (int)$e->getCode());
		}
	}

	// Get existing instance or create one if none are existent (Singleton)
	public static function getInstance()
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	// Execute a SELECT query on the Database
	public function select($sql)
	{
		$sth = $this->pdo->query($sql);
		return $sth->fetchAll();
	}

	// Execute a SQL query
	public function exec($sql)
	{
		return $this->pdo->exec($sql);
	}
	// Return the ID of the last inserted row or sequence value
	public function lastInsertId()
	{
		return $this->pdo->lastInsertId();
	}
}
