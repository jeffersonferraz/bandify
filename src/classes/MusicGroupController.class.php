<?php

class MusicGroupController extends MusicGroup {

    public function __construct($userId) {

        $this->userId = $userId;
    }

    public function updateMusicGroup($groupName, $groupCityId, $members, $groupId) {

        if (empty($groupName) && empty($groupCityId) && empty($members) && empty($groupId) == null) {

            header("location: ../musicGroup.php?error=empty-input");
            exit();
        }

        $this->setMusicGroup($groupName, $groupCityId, $members, $groupId);
    }

    public function updateMusicGroupMember($groupId, $admin, $memberId) {

        if (empty($groupId) && empty($admin) && empty($userId) && empty($memberId) == null) {

            header("location: ../musicGroup.php?error=empty-input");
            exit();
        }

        $this->setMusicGroupMember($groupId, $admin, $this->userId, $memberId);
    }

    public function updateMusicGroupInfluence($influenceId, $groupId) {

        if (empty($influenceId) && empty($groupId) == null) {

            header("location: ../musicGroup.php?error=empty-input");
            exit();
        }

        $this->setMusicGroupInfluence($influenceId, $groupId);
    }
}