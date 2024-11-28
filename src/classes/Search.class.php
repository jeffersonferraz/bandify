<?php

class Search extends Db {

    protected function getCities() {

        $stmt = $this->connect()->prepare('SELECT * FROM cities;');
        if (!$stmt->execute()) {
            $stmt = null;
            exit();
        }
        $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cities;
        
    }
}