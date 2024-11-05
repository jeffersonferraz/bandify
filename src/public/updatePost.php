<?php

if (!isset($_SESSION["userId"])) {
    header("Location: ../index.php?error=user-not-logged-in"); // Redirect if not logged in
    exit();
}

require '../classes/Db.class.php';
require '../classes/Post.class.php';
require '../classes/PostController.class.php';

$postController = new PostController();

if (isset($_POST["post-update"])) {
    $postId = $_POST["postId"];
    $postTitle = $_POST["title"];
    $postDescription = $_POST["description"];

    // Update the post
    $postController->updatePost($postId, $postTitle, $postDescription);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/main.css">
    <title>bandify | Update Post</title>
</head>
<body>
<div class="container">
    <a href="../index.php">
        <h1 class="logo">bandify</h1>
        <p class="subtitle">let's make some noise together!</p>
    </a>
    <form action="updatePost.php" method="post">
        <input class="input-data" name="postId" type="number" placeholder="Post ID" required><br>
        <input class="input-data" name="title" type="text" placeholder="Title" required><br>
        <textarea class="input-data" name="description" placeholder="Description"></textarea><br>
        <button class="submit-button" name="post-update" type="submit">Update</button><br>
    </form>
</div>
</body>
</html>
