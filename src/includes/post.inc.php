<?php

include "../classes/Db.class.php";
include "../classes/Post.class.php";
include "../classes/PostController.class.php";

// Grabbing posts data
$posts = new PostController;
$posts = $posts->fetchAllUserPosts();

if (isset($_POST["post-submit"])) {
    $postTitle = $_POST["title"];
    $postDescription = $_POST["description"];
    $postCityId  = $_POST["city-name"];
    $postController = new PostController();
    $postController->createPost($postTitle, $postDescription, $postCityId);
    header("Location: ../public/myPosts.php?status=post-created"); // Umleitung nach Erstellung
    exit();
}

if (isset($_POST["post-update"])) {
    $postId = $_POST["postId"];
    $postTitle = $_POST["title"];
    $postDescription = $_POST["description"];
    $postController = new PostController();
    $postController->updatePost($postId, $postTitle, $postDescription);
    header("Location: ../index.php?status=post-updated"); // Umleitung nach Aktualisierung
    exit();
}

// Umleitung bei Bestätigung der Löschung
if (isset($_POST["delete-confirm"])) {
    $postId = $_POST["postId"];
    $postController = new PostController('', '', '');
    $postController->deletePost($postId);
    header("Location: ../index.php?status=post-deleted");
    exit();
}

