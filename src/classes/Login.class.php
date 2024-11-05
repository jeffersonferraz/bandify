<?php

class Login extends Db {

    protected function getUser($email, $password) {
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE email = ?;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("Location: ../index.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location: ../index.php?error=user-not-found-1");
            exit();
        }

        $hashedPassword = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $hashedPassword[0]["password"]);

        if ($checkPassword == false) {
            $stmt = null;
            header("Location: ../index.php?error=wrong-password");
            exit();
        } elseif ($checkPassword == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?;');

            if (!$stmt->execute(array($email))) {
                $stmt = null;
                header("Location: ../index.php?error=sql-statement-failed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("Location: ../index.php?error=user-not-found-2");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userId"] = $user[0]["userId"];
            $_SESSION["firstname"] = $user[0]["firstname"];

            $stmt = null;
        }

        $stmt = null;
    }
}