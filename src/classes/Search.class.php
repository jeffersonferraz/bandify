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

    protected function getPostByTitle($postTitle, $cityId) {

        if (isset($cityId)) {
            $stmt = $this->connect()->prepare('SELECT * FROM posts WHERE title = ? AND postCityId = ?;');
            if (!$stmt->execute(array($postTitle, $cityId))) {
                $stmt = null;
                exit();
            }
        } else {
            $stmt = $this->connect()->prepare('SELECT * FROM posts WHERE title = ?');
            if (!$stmt->execute(array($postTitle))) {
                $stmt = null;
                exit();
            }
        }
        $post = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $post;
    }

    protected function getMusicianByName($musicianName, $cityId) {

        if (isset($cityId)) {
            $stmt = $this->connect()->prepare('SELECT firstname, lastname FROM users WHERE userCityId = ? AND firstname = ? OR lastname = ?;');
            if (!$stmt->execute(array($cityId, $musicianName, $musicianName))) {
                $stmt = null;
                exit();
            }
        } else {
            $stmt = $this->connect()->prepare('SELECT firstname, lastname FROM users WHERE firstname = ? OR lastname = ?;');
            if (!$stmt->execute(array($musicianName, $musicianName))) {
                $stmt = null;
                exit();
            }
        }
        $musician = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $musician;
    }

    protected function getGroupByName($groupName, $cityId) {

        if (isset($cityId)) {
            $stmt = $this->connect()->prepare('SELECT * FROM musicGroups WHERE groupName = ? AND groupCityId = ?;');
            if (!$stmt->execute(array($groupName, $cityId))) {
                $stmt = null;
                exit();
            }
        } else {
            $stmt = $this->connect()->prepare('SELECT * FROM musicGroups WHERE groupName = ?;');
            if (!$stmt->execute(array($groupName))) {
                $stmt = null;
                exit();
            }
        }
        $musicGroup = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $musicGroup;
    }
}