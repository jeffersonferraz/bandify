<?php

if(isset($_POST["signup-submit"])) {

    // Grabbing the data
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];

    // Instantiate Signup class
    // Ordering of includes are important
    include "../classes/Db.class.php";
    include "../classes/Signup.class.php";
    include "../classes/SignupController.class.php";

    $signup = new SignupController($firstname, $lastname, $email, $password, $passwordRepeat);

    // Running error handlers and user signup
    $signup->signupUser();

    $userId = $signup->fetchUserId($firstname);

    // Instantiate Profile class
    include "../classes/Profile.class.php";
    include "../classes/ProfileController.class.php";
    $profile = new ProfileController($userId, $firstname);
    $profile->defaultProfile();

    // Going to back to front page
    header("Location: ../index.php?error=none");
}

