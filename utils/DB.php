<?php

class DB
{
	/**
	 * Initialize properties.
	 */

	/**
	 * Instance of the DB class.
	 * @var DB
	 */
	private static $instance = null;

	/**
	 * PDO instance for database connection.
	 * @var PDO
	 */
	private $pdo;

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

	/**
	 * Retrieves the singleton instance of the DB class.
	 * If no instance exists, it creates one. Otherwise, it returns the existing instance.
	 *
	 * @return DB The singleton instance of the DB class.
	 */
	public static function getInstance()
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	/**
     * Prepares an SQL statement for execution.
     * Returns a PDOStatement object.
     *
     * @param string $sql The SQL query to prepare.
     * @return PDOStatement A PDOStatement object representing the prepared statement.
     * @throws PDOException If there is an error preparing the statement.
     */
    public function prepare($sql)
    {
        try {
            return $this->pdo->prepare($sql);
        } catch (PDOException $e) {
            throw new PDOException("Prepare failed: ". $e->getMessage(), (int)$e->getCode());
        }
    }

	/**
	 * Execute a SELECT query and returns the result.
	 * Uses PDO to prepare and execute the query, returning all fetched rows.
	 *
	 * @param string $sql The SQL query to execute.
	 * @return array An associative array containing the result set.
	 * @throws PDOException If there is an error executing the query.
	 */
	public function select($sql)
	{
		$sth = $this->pdo->query($sql);
		return $sth->fetchAll();
	}

	/**
	 * Execute an INSERT, UPDATE, DELETE, or other non-SELECT query.
	 * Uses PDO to prepare and execute the query, returning the number of affected rows.
	 *
	 * @param string $sql The SQL query to execute.
	 * @return int The number of rows affected by the query.
	 * @throws PDOException If there is an error executing the query.
	 */
	public function exec($sql)
	{
		return $this->pdo->exec($sql);
	}


	/**
	 * Return the ID of the last inserted row or sequence value.
	 * Useful for auto-incrementing fields.
	 *
	 * @return mixed The ID of the last inserted row or sequence value.
	 */
	public function lastInsertId()
	{
		return $this->pdo->lastInsertId();
	}
}
