<?php

class MusicGroupView extends MusicGroup {

    public function fetchMusicGroup($userId) {

        return $this->getMusicGroup($userId);
    }

    public function fetchMusicGroupCity($groupId) {

        return $this->getMusicGroupCity($groupId);
    }

    public function fetchMusicGroupMember($groupId) {

        return $this->getMusicGroupMember($groupId);
    }

    public function fetchMusicGroupAdmin($userId) {

        return $this->getMusicGroupAdmin($userId);
    }

    public function fetchMusicGroupInfluence($groupId) {

        return $this->getMusicGroupInfluence($groupId);
    }
}