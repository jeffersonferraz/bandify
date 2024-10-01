<?php

class Database
{
    public $connection;

    public function __construct()
    {
        // Correct DSN definition for MySQL
        $dsn = 'mysql:host=localhost;port=3307;dbname=bandify;charset=utf8';
        $username = 'root';
        $password = 'root';

        try {
            // Establish connection to the database
            $this->connection = new PDO($dsn, $username, $password);
            // Enable error handling in PDO (Exception mode)
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Output error message if the connection fails
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function query($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            // If the query is a SELECT statement, return the results
            if (strpos($query, 'SELECT') !== false) {
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }
            return $statement;
        } catch (PDOException $e) {
            // Output error message if the query fails
            die("Query failed: " . $e->getMessage());
        }
    }
}
