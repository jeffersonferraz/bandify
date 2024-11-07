<?php
session_start();

include "../classes/Db.class.php";
include "../classes/Post.class.php";
include "../classes/PostController.class.php";

if (isset($_POST["post-submit"])) {
    $postTitle = $_POST["title"];
    $postDescription = $_POST["description"];
    $postController = new PostController($postTitle, $postDescription);
    $postController->createPost();
    header("Location: ../index.php?status=post-created"); // Umleitung nach Erstellung
    exit();
}

if (isset($_POST["post-update"])) {
    $postId = $_POST["postId"];
    $postTitle = $_POST["title"];
    $postDescription = $_POST["description"];
    $postController = new PostController($postTitle, $postDescription);
    $postController->updatePost($postId, $postTitle, $postDescription);
    header("Location: ../index.php?status=post-updated"); // Umleitung nach Aktualisierung
    exit();
}

// Umleitung bei Bestätigung der Löschung
if (isset($_POST["delete-confirm"])) {
    $postId = $_POST["postId"];
    $postController = new PostController('', '');
    $postController->deletePost($postId);
    header("Location: ../index.php?status=post-deleted");
    exit();
}

// Begin HTML-Output nur bei Anzeige der Lösch-Bestätigung
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/main.css">
    <title>bandify | Confirm Delete</title>
</head>
<body>
<div class="container">
    <a href="../index.php">
        <h1 class="logo">bandify</h1>
        <p class="subtitle">let's make some noise together!</p>
    </a>

    <?php
    if (isset($_POST["post-delete"])) {
        $postId = $_POST["postId"];
        $postController = new PostController('', '');

        $post = $postController->fetchPostById($postId, $_SESSION["userId"]);
        if ($post) {
            ?>
            <h2>Confirm Delete Post</h2>
            <p>Are you sure you want to delete the following post?</p>
            <div class="post-details">
                <p><strong>Title:</strong> <?php echo htmlspecialchars($post['title']); ?></p>
                <p><strong>Description:</strong> <?php echo htmlspecialchars($post['description']); ?></p>
            </div>
            <form action="../includes/post.inc.php" method="post">
                <input type="hidden" name="postId" value="<?php echo htmlspecialchars($postId); ?>">
                <button class="submit-button" name="delete-confirm" type="submit">Delete this</button>
            </form>
            <a href="../public/post.php?action=read"><button class="cancel-button">Cancel</button></a>
            <?php
        } else {
            echo "<p class='error-message'>Post not found.</p>";
        }
    }
    ?>
</div>
</body>
</html>
