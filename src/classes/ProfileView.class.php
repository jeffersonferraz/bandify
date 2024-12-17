<?php

class ProfileView extends Profile {

    public function fetchCity($userId) {

        $profile = $this->getProfile($userId);
        $profileCityId = $profile[0]["profileCityId"];
        return $this->getCity($profileCityId);
    }

    public function fetchBio($userId) {

        $profile = $this->getProfile($userId);

        echo $profile[0]['bio'];
    }

    public function fetchInstrument($userId) {

        return $this->getInstrument($userId);
    }

    public function fetchInfluence($userId) {

        return $this->getInfluence($userId);
    }
}