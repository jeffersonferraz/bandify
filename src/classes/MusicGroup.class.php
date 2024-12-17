<?php

class MusicGroup extends Db {

    protected function getMusicGroup($userId) {

        $stmt = $this->connect()->prepare('SELECT * FROM musicGroups G INNER JOIN musicGroupMembers M ON G.groupId = M.groupId WHERE M.userId = ?;');

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

    protected function setMusicGroup($groupName, $groupCityId, $members, $groupId) {

        $stmt = $this->connect()->prepare('UPDATE musicGroups SET groupName = ?, groupCityId = ?, members = ? WHERE groupId = ?;');

        if (!$stmt->execute(array($groupName, $groupCityId, $members, $groupId))) {
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

    protected function getMusicGroupMember($memberId) {

        $stmt = $this->connect()->prepare('SELECT * FROM musicGroupMembers WHERE  memberId = ?;');

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

    protected function setMusicGroupMember($groupId, $admin, $userId, $memberId) {

        $stmt = $this->connect()->prepare('UPDATE musicGroupMembers SET groupId = ?, admin = ?, userId = ? WHERE memebrId = ?;');

        if (!$stmt->execute(array($groupId, $admin, $userId, $memberId))) {
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

    protected function setNewMusicGroupMember($groupId, $admin, $userId) {

        $stmt = $this->connect()->prepare('INSERT INTO musicGroupMembers (groupId, admin, userId) VALUES (?, ?, ?);');

        if (!$stmt->execute(array($groupId, $admin, $userId))) {
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

        $stmt = $this->connect()->prepare('SELECT * FROM influences I INNER JOIN musicGroupInfluences M ON I.influenceId = M.influenceId WHERE M.groupId = ?;');

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