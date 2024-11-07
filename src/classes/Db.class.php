<?php

class Db {
    protected function connect() {
        try {
            $username = 'root'; // MySQL username
            $password = 'root'; // MySQL password
            $database = 'bandify'; // database name
            $host = 'bandify_database'; // MySQL container name

            $dsn = "mysql:dbname=" . $database . ";host=" . $host;
            return new PDO($dsn, $username, $password);
        } catch (PDOException $error) {
            print "Error!: " . $error->getMessage() . "<br/>";
            die();
        }
    }
}
?>
