<?php

class MusicGroupView extends MusicGroup {

    public function fetchMusicGroup($userId) {

        return $this->getMusicGroup($userId);
    }

    public function fetchMusicGroupMember($memberId) {

        return $this->getMusicGroupMember($memberId);
    }

    public function fetchMusicGroupInfluence($groupId) {

        return $this->getMusicGroupInfluence($groupId);
    }
}