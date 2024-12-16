<?php

session_start();

function dd($data) {
    echo '<pre>';
    die(var_dump($data));
    echo '</pre>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userId = $_SESSION['userId'];
    $firstname = $_SESSION['firstname'];
    $bio = htmlspecialchars($_POST['bio'], ENT_QUOTES, "UTF-8");
    $city = $_POST['city'];
    $instrument = $_POST['instrument'];
    $influence = $_POST['influence'];

    include "../classes/Db.class.php";
    include "../classes/Profile.class.php";
    include "../classes/ProfileController.class.php";
    $profile = new ProfileController($userId, $firstname);

    $profile->updateProfile($city, $bio);
    $profile->updateInstrument($instrument);
    $profile->updateInfluencer($influence);

    header("location: ../public/dashboard.php?error=none");
}