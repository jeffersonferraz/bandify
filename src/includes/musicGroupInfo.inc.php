<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userId = $_SESSION['userId'];
    $groupName = $_POST['groupName'];
    $groupCity = $_POST['city'];
    $groupInfluence = $_POST['influence'];

    include "../classes/Db.class.php";
    include "../classes/MusicGroup.class.php";
    include "../classes/MusicGroupController.class.php";
    include "../classes/MusicGroupView.class.php";
    $musicGroupController = new MusicGroupController($userId);
    $musicGroupView = new MusicGroupView();

    $group = $musicGroupView->fetchMusicGroup($_SESSION['userId']);
    $groupId = $group[0]['groupId'];

    $musicGroupController->updateMusicGroup($groupName, $groupCity, $groupId);
    $musicGroupController->updateMusicGroupInfluence($groupInfluence, $groupId);

    header("location: ../public/musicGroup.php?error=none");
}