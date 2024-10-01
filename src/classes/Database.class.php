<?php

class Database
{
    public $connection;

    public function __construct()
    {
        //connect MySQL database
        $dsn = 'mysql:host=127.0.0.1;port=3307;dbname=bandify';
        $username = 'root';
        $password = 'root';

        $this->connection = new PDO($dsn ,$username ,$password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);

        $statement->execute($params);

        return $statement;
    }
}