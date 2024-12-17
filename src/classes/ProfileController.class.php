<?php

class ProfileController extends Profile {

    private $userId;
    private $firstname;

    public function __construct($userId, $firstname) {

        $this->userId = $userId;
        $this->firstname = $firstname;
    }

    public function defaultProfile() {

        $profileCityId = 1;
        $instrumentId = 1;
        $influencerId = 1;
        $bio = "Write something about yourself, " . $this->firstname . "!";
        $this->setRegisteredProfile($this->userId);
        $this->updateProfile($profileCityId, $bio);
        $this->setNewInstrument($this->userId ,$instrumentId);
        $this->setNewInfluence($this->userId ,$influencerId);
    }

    public  function updateProfile($cityId, $bio) {

        if (empty($cityId) && empty($bio) == true) {

            header("location: ../profile.php?error=empty-input");
            exit();
        }

        $this->setProfile($cityId, $bio, $this->userId);
    }

    public function updateInstrument($instrumentId) {

        if (empty($instrumentId) == true) {

            header("location: ../profile.php?error=empty-input");
            exit();
        }

        $this->setInstrument($this->userId, $instrumentId);
    }

    public function updateInfluencer($influenceId) {

        if (empty($influenceId) == true) {

            header("location: ../profile.php?error=empty-input");
            exit();
        }

        $this->setInfluence($this->userId, $influenceId);
    }
}