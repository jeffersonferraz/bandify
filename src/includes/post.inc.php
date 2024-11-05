<?php
session_start(); // Session starten, um auf die userId zuzugreifen

if (isset($_POST["post-submit"])) { // Check if the post button was pressed.

    // Grabbing the data
    $postTitle = $_POST["title"];
    $postDescription = $_POST["description"];

    // Include necessary classes
    include "../classes/Db.class.php";
    include "../classes/Post.class.php";
    include "../classes/PostController.class.php";

    // Instantiate PostController with post information
    $postController = new PostController($postTitle, $postDescription);

    // Perform the creation of the post
    $postController->createPost();
}
