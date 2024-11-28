<?php

class Profile extends Db {

    protected function getProfile($userId) {

        $stmt = $this->connect()->prepare('SELECT * FROM profiles WHERE userId = ?;');

        if (!$stmt->execute(array($userId))) {
            $stmt = null;
            header("location: dashboard.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: dashboard.php?error=profile-not-found");
            exit();
        }

        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $profileData;
    }

    protected function setNewProfile($city, $bio, $userId) {

        $stmt = $this->connect()->prepare('UPDATE profiles SET city = ?, bio = ? WHERE userId = ?;');

        if (!$stmt->execute(array($city, $bio, $userId))) {
            $stmt = null;
            header("location: dashboard.php?error=sql-statement-failed");
            exit();
        }

        $stmt = null;
    }

    protected function setProfile($city, $bio, $userId) {

        $stmt = $this->connect()->prepare('INSERT INTO profiles (city, bio, userId) VALUES (?, ?, ?);');

        if (!$stmt->execute(array($city, $bio, $userId))) {
            $stmt = null;
            header("location: dashboard.php?error=sql-statement-failed");
            exit();
        }

        $stmt = null;
    }

}