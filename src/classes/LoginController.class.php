<?php

class LoginController extends Login {

    private $email;
    private $password;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function loginUser() {
        if ($this->emptyInput() == false) {
            //echo "Empty input!";
            header("Location: ../index.php?error=empty-input");
            exit();
        }

        $this->getUser($this->email, $this->password);
    }

    private function emptyInput() {

        if (empty($this->email) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}