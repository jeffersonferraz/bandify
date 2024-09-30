<?php

class Database
{
    public $connection;

    public function __construct()
    {
        //connect MySQL database
        $dsn = 'mysql:localhost;3307;bandify';
        $username = 'root';
        $password = 'root';

        $this->connection = new PDO($dsn ,$username, $password);
    }

    public function query($query, $params)
    {
        $statement = $this->connection->prepare($query);

        $statement->execute($params);

        return $statement;
    }
}