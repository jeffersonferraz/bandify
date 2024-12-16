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

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function setProfile($city, $bio, $userId) {

        $stmt = $this->connect()->prepare('UPDATE profiles SET cityName = ?, bio = ? WHERE userId = ?;');

        if (!$stmt->execute(array($city, $bio, $userId))) {
            $stmt = null;
            header("location: dashboard.php?error=sql-statement-failed");
            exit();
        }

        $stmt = null;
    }

    protected function setRegisteredProfile($bio, $userId) {

        $stmt = $this->connect()->prepare('INSERT INTO profiles (bio, userId) VALUES (?, ?);');

        if (!$stmt->execute(array($bio, $userId))) {
            $stmt = null;
            header("location: dashboard.php?error=sql-statement-failed");
            exit();
        }

        $stmt = null;
    }

    protected function getCity($profileCityId) {

        $stmt = $this->connect()->prepare('SELECT * FROM cities INNER JOIN profiles ON cityId = profileCityId WHERE profileCityId = ?;');

        if (!$stmt->execute(array($profileCityId))) {
            $stmt = null;
            header("location: dashboard.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: dashboard.php?error=city-not-set");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function getInstrument($userId) {

        $stmt = $this->connect()->prepare('SELECT instrumentName FROM instruments I INNER JOIN userInstruments U ON I.instrumentId = U.instrumentId WHERE U.userId = ?;');

        if (!$stmt->execute(array($userId))) {
            $stmt = null;
            header("location: dashboard.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: dashboard.php?error=instrument-not-set");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function getInfluencer($userId) {

        $stmt = $this->connect()->prepare('SELECT influenceName, genre FROM influences I INNER JOIN userInfluences U ON I.influenceId = U.influenceId WHERE U.userId = ?;');

        if (!$stmt->execute(array($userId))) {
            $stmt = null;
            header("location: dashboard.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: dashboard.php?error=instrument-not-set");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}