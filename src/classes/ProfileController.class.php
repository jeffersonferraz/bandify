<?php

class ProfileController extends Profile {

    private $userId;
    private $firstname;

    public function __construct($userId, $firstname) {

        $this->userId = $userId;
        $this->firstname = $firstname;
    }

    public function defaultProfile() {

        $bio = "Write something about yourself, " . $this->firstname . "!";
        $this->setProfile($bio, $this->userId);
    }

    public  function updateProfile($city, $bio) {

        // Error handlers
        if ($this->emptyInputCheck($city, $bio) == true) {

            header("location: ../profile.php?error=empty-input");
            exit();
        }

        // Update profile
        $this->setNewProfile($city, $bio, $this->userId);
    }

    private function emptyInputCheck($city, $bio) {

        if (empty($city) || empty($bio)) {

            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }
}