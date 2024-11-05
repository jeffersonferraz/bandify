<?php
session_start();

// Include necessary classes
include "../classes/Db.class.php";
include "../classes/Post.class.php";
include "../classes/PostController.class.php";

// Handle form submission for creating a post
if (isset($_POST["post-submit"])) {
    // Grabbing the data
    $postTitle = $_POST["title"];
    $postDescription = $_POST["description"];

    // Instantiate PostController with post information
    $postController = new PostController($postTitle, $postDescription);

    // Perform the creation of the post
    $postController->createPost();
}

// Handle form submission for updating a post
if (isset($_POST["post-update"])) {
    // Grabbing the data
    $postId = $_POST["postId"];
    $postTitle = $_POST["title"];
    $postDescription = $_POST["description"];

    // Instantiate PostController for updating the post
    $postController = new PostController($postTitle, $postDescription);

    // Perform the update of the post
    $postController->updatePost($postId, $postTitle, $postDescription);
}

// Handle form submission for deleting a post
if (isset($_POST["post-delete"])) {
    // Grabbing the data
    $postId = $_POST["postId"];

    // Instantiate PostController for deleting the post
    $postController = new PostController('', '');

    // Fetch post details to confirm deletion
    $post = $postController->fetchPostById($postId, $_SESSION["userId"]); // Neue Methode, um den Post zu erhalten
    if ($post) {
        ?>
        <h2>Confirm Delete Post</h2>
        <p>Are you sure you want to delete the following post?</p>
        <p><strong>Title:</strong> <?php echo htmlspecialchars($post['title']); ?></p>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($post['description']); ?></p>
        <form action="../includes/post.inc.php" method="post">
            <input type="hidden" name="postId" value="<?php echo htmlspecialchars($postId); ?>">
            <button class="submit-button" name="delete-confirm" type="submit">Delete this</button>
        </form>
        <?php
    } else {
        header("Location: ../index.php?error=no-post-found");
        exit();
    }
}

// Handle confirmation of deletion
if (isset($_POST["delete-confirm"])) {
    // Grabbing the data
    $postId = $_POST["postId"];

    // Instantiate PostController for deleting the post
    $postController = new PostController('', '');

    // Perform the deletion of the post
    $postController->deletePost($postId);
}
?>
