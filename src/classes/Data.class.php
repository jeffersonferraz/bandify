<?php

class Data extends Db {

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
}