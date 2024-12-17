<?php

include "../classes/Db.class.php";
include "../classes/Post.class.php";
include "../classes/PostController.class.php";

// Grabbing posts data
$posts = new PostController;
$posts = $posts->fetchAllPosts();

if (isset($_POST["post-submit"])) {
    $postTitle = $_POST["title"];
    $postDescription = $_POST["description"];
    $postCityId = $_POST["city-name"];
    $postController = new PostController();
    $postController->createPost($postTitle, $postDescription, $postCityId);
    header("Location: ../public/myPosts.php?status=post-created");
    exit();
}

if (isset($_POST["post-edit"])) {
    $postId = $_POST["post-id"];

    $searchPost = new PostController();
    $post = $searchPost->fetchPost($postId);

    // Convert the array $post to a query string and pass it via URL
    $queryString = http_build_query(array('post' => $post));

    // var_dump($post);

    // Going back to front page
    if (!empty($queryString)) {
        header("Location: ../public/editPost.php?" . $queryString);
    } else {
        header("Location: ../public/editPost.php?post-not-found");
    }

}

if (isset($_POST["post-update"])) {
    $postId = $_POST["post-id"]; 
    $postTitle = $_POST["title"];
    $postDescription = $_POST["description"];
    $postCityId = $_POST["city-name"];
    $postController = new PostController();
    $postController->updatePost($postTitle, $postDescription, $postCityId, $postId);

    header("Location: ../public/myPosts.php?status=post-updated");
    exit();
}

if (isset($_POST["post-delete"])) {
    $postId = $_POST["post-id"];
    $postController = new PostController();
    $postController->deletePost($postId);
}