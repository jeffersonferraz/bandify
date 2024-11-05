<?php

class Db {
    protected function connect() {
        try {
            $username = 'root';
            $password = 'root';
            $database = 'bandify';
            $host = 'bandify_database';

            $dsn = "mysql:dbname=" . $database . ";host=" . $host;
            return new PDO($dsn, $username, $password);
        } catch (PDOException $error) {
            print "Error!: " . $error->getMessage() . "<br/>";
            die();
        }
    }
}
?>
