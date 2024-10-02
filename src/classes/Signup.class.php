<?php

class Signup extends Db {

    protected function checkUser($email) {
        $stmt = $this->connect()->prepare('SELECT userId FROM users WHERE email = ?;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("Location: ../index.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    protected function setUser($firstname, $lastname, $password, $email) {
        $stmt = $this->connect()->prepare('INSERT INTO users (firstname, lastname, password, email) VALUES (?, ?, ?, ?);');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($firstname, $lastname, $hashedPassword, $email))) {
            $stmt = null;
            header("Location: ../index.php?error=sql-statement-failed");
            exit();
        }

        $stmt = null;
    }
}