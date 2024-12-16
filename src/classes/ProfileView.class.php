<?php

class ProfileView extends Profile {

    public function fetchCity($userId) {

        $profile = $this->getProfile($userId);
        $profileCityId = $profile[0]["profileCityId"];
        $city = $this->getCity($profileCityId);

        echo $city[0]['cityName'] . ", " . $city[0]['state'];
    }

    public function fetchBio($userId) {

        $profile = $this->getProfile($userId);

        echo $profile[0]['bio'];
    }

    public function fetchInstrument($userId) {

        $instrument = $this->getInstrument($userId);

        echo $instrument[0]['instrumentName'];
    }

    public function fetchInfluencer($userId) {

        $influencer = $this->getInfluencer($userId);

        echo $influencer[0]['influenceName'] . ' / ' . $influencer[0]['genre'];
    }
}