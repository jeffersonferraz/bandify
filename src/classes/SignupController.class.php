<?php

class SignupController extends Signup {

    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $passwordRepeat;

    public function __construct($firstname, $lastname, $email, $password, $passwordRepeat) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
    }

    public function signupUser() {
        if ($this->emptyInput() == false) {
            //echo "Empty input!";
            header("Location: ../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidName() == false) {
            //echo "invalid name!";
            header("Location: ../index.php?error=name");
            exit();
        }
        if ($this->invalidEmail() == false) {
            //echo "invalid email!";
            header("Location: ../index.php?error=email");
            exit();
        }
        if ($this->passwordMatch() == false) {
            //echo "password doesn't match!";
            header("Location: ../index.php?error=passwordmatch");
            exit();
        }
        if ($this->userEmailTakenCheck() == false) {
            //echo "email taken!";
            header("Location: ../index.php?error=user-emailtaken");
            exit();
        }

        $this->setUser($this->firstname, $this->lastname, $this->password, $this->email);
    }

    private function emptyInput() {

        if (empty($this->firstname) || empty($this->lastname) || empty($this->email) || empty($this->password) || empty($this->passwordRepeat)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidName() {

        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->firstname)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function passwordMatch() {

        if ($this->password !== $this->passwordRepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function userEmailTakenCheck() {

        if (!$this->checkUser($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}