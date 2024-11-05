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

// Fetch all posts
$postController = new PostController('', '');
$posts = $postController->fetchAllPosts();
?>

<!-- Displaying posts in a table -->
<?php if ($posts && count($posts) > 0): ?>
    <table>
        <thead>
        <tr>
            <th>Post ID</th>
            <th>Author ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date Created</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?php echo htmlspecialchars($post['postId']); ?></td>
                <td><?php echo htmlspecialchars($post['authorId']); ?></td>
                <td><?php echo htmlspecialchars($post['title']); ?></td>
                <td><?php echo htmlspecialchars($post['description']); ?></td>
                <td><?php echo htmlspecialchars($post['created_at']); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No posts available.</p>
<?php endif; ?>
