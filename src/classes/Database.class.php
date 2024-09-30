<?php

class Database
{
    public $connection;

    public function __construct()
    {
        //connect MySQL database
        $dsn = 'mysql:host=localhost;port=3307;dbname=bandify';
        $username = 'root';

        $this->connection = new PDO($dsn ,$username);
    }

    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);

        $statement->execute($params);

        return $statement;
    }
}