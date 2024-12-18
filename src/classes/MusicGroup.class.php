<?php

class MusicGroup extends Db {

    protected function getMusicGroup($memberId) {

        $stmt = $this->connect()->prepare('SELECT * FROM musicGroups G INNER JOIN musicGroupMembers M ON G.groupId = M.groupId WHERE M.memberId = ?;');

        if (!$stmt->execute(array($memberId))) {
            $stmt = null;
            header("location: musicGroup.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: musicGroup.php?error=profile-not-found");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function getMusicGroupCity($groupId) {

        $stmt = $this->connect()->prepare('SELECT * FROM cities C INNER JOIN musicGroups G ON C.cityId = G.groupCityId WHERE G.groupId = ?;');

        if (!$stmt->execute(array($groupId))) {
            $stmt = null;
            header("location: musicGroup.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: musicGroup.php?error=profile-not-found");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function setMusicGroup($groupName, $groupCityId, $groupId) {

        $stmt = $this->connect()->prepare('UPDATE musicGroups SET groupName = ?, groupCityId = ? WHERE groupId = ?;');

        if (!$stmt->execute(array($groupName, $groupCityId, $groupId))) {
            $stmt = null;
            header("location: musicGroup.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: musicGroup.php?error=profile-not-found");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function setNewMusicGroup($groupName, $groupCityId, $members) {

        $stmt = $this->connect()->prepare('INSERT INTO musicGroups (groupName, groupCityId, members) VALUES (?, ?, ?);');

        if (!$stmt->execute(array($groupName, $groupCityId, $members))) {
            $stmt = null;
            header("location: musicGroup.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: musicGroup.php?error=profile-not-found");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function getMusicGroupMember($groupId) {

        $stmt = $this->connect()->prepare('SELECT U.userId, U.firstname, U.lastname FROM users U INNER JOIN musicGroupMembers M ON U.userId = M.memberId WHERE M.groupId = ?;');

        if (!$stmt->execute(array($groupId))) {
            $stmt = null;
            header("location: musicGroup.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: musicGroup.php?error=profile-not-found");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function getMusicGroupAdmin($userId) {

        $stmt = $this->connect()->prepare('SELECT admin FROM musicGroupMembers M INNER JOIN users U ON M.memberId = U.userId WHERE U.userId = ?;');

        if (!$stmt->execute(array($userId))) {
            $stmt = null;
            header("location: musicGroup.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: musicGroup.php?error=profile-not-found");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function setMusicGroupMember($groupId, $admin, $memberId) {

        $stmt = $this->connect()->prepare('UPDATE musicGroupMembers SET groupId = ?, admin = ? WHERE memebrId = ?;');

        if (!$stmt->execute(array($groupId, $admin, $memberId))) {
            $stmt = null;
            header("location: musicGroup.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: musicGroup.php?error=profile-not-found");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function setNewMusicGroupMember($groupId, $admin) {

        $stmt = $this->connect()->prepare('INSERT INTO musicGroupMembers (groupId, admin) VALUES (?, ?, ?);');

        if (!$stmt->execute(array($groupId, $admin))) {
            $stmt = null;
            header("location: musicGroup.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: musicGroup.php?error=profile-not-found");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function getMusicGroupInfluence($groupId) {

        $stmt = $this->connect()->prepare('SELECT * FROM influences I INNER JOIN musicGroupInfluences G ON I.influenceId = G.influenceId WHERE G.groupId = ?;');

        if (!$stmt->execute(array($groupId))) {
            $stmt = null;
            header("location: musicGroup.php?error=sql-statement-failed");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function setMusicGroupInfluence($influenceId, $groupId) {

        $stmt = $this->connect()->prepare('UPDATE musicGroupInfluences SET influenceId = ? WHERE groupId = ?;');

        if (!$stmt->execute(array($influenceId, $groupId))) {
            $stmt = null;
            header("location: musicGroup.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: musicGroup.php?error=profile-not-found");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function setNewMusicGroupInfluence($groupId, $influenceId) {

        $stmt = $this->connect()->prepare('INSERT INTO musicGroupInfluences (groupId, influenceId) VALUES (?, ?);');

        if (!$stmt->execute(array($groupId, $influenceId))) {
            $stmt = null;
            header("location: musicGroup.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: musicGroup.php?error=profile-not-found");
            exit();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}