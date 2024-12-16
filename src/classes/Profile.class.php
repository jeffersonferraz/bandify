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

    protected function setProfile($profileCityId, $bio, $userId) {

        $stmt = $this->connect()->prepare('UPDATE profiles SET profileCityId = ?, bio = ? WHERE userId = ?;');

        if (!$stmt->execute(array($profileCityId, $bio, $userId))) {
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

    protected function getAllCities() {

        $stmt = $this->connect()->prepare('SELECT * FROM cities;');

        if (!$stmt->execute()) {
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

        $stmt = $this->connect()->prepare('SELECT * FROM instruments I INNER JOIN userInstruments U ON I.instrumentId = U.instrumentId WHERE U.userId = ?;');

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

    protected function getAllInstruments() {

        $stmt = $this->connect()->prepare('SELECT * FROM instruments;');

        if (!$stmt->execute()) {
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

    protected function setInstrument($instrumentId, $userId) {

        $stmt = $this->connect()->prepare('UPDATE userInstruments SET instrumentId = ? WHERE userId = ?; ');

        if (!$stmt->execute(array($userId, $instrumentId))) {
            $stmt = null;
            header("location: dashboard.php?error=sql-statement-failed");
            exit();
        }

        $stmt = null;
    }

    protected function getInfluence($userId) {

        $stmt = $this->connect()->prepare('SELECT * FROM influences I INNER JOIN userInfluences U ON I.influenceId = U.influenceId WHERE U.userId = ?;');

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

    protected function getAllInfluences() {

        $stmt = $this->connect()->prepare('SELECT * FROM influences;');

        if (!$stmt->execute()) {
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

    protected function setInfluence($influenceId, $userId) {

        $stmt = $this->connect()->prepare('UPDATE userInfluences SET influenceId = ? WHERE userId = ?; ');

        if (!$stmt->execute(array($userId, $influenceId))) {
            $stmt = null;
            header("location: dashboard.php?error=sql-statement-failed");
            exit();
        }

        $stmt = null;
    }

}