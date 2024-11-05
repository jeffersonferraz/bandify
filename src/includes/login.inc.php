<?php

if(isset($_POST["login-submit"])) {

    // Grabbing the data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Instantiate Login class
    // Ordering of includes are important
    include "../classes/Db.class.php";
    include "../classes/Login.class.php";
    include "../classes/LoginController.class.php";

    $login = new LoginController($email, $password);

    // Running error handlers and user signup
    $login->loginUser();

    // Going back to front page
    header("Location: ../public/dashboard.php");
}