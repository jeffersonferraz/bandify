<?php

class ProfileController extends Profile {

    private $userId;
    private $firstname;

    public function __construct($userId, $firstname) {

        $this->userId = $userId;
        $this->firstname = $firstname;
    }

    public function newProfile() {

        $bio = "Write something about yourself, " . $this->firstname . "!";
        $this->setRegisteredProfile($bio, $this->userId);
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