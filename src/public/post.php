<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/main.css">
    <title>bandify | Manage Posts</title>
</head>
<body>
<div class="container">
    <a href="../index.php">
        <h1 class="logo">bandify</h1>
        <p class="subtitle">let's make some noise together!</p>
    </a>
    <div class="button-container">
        <a href="post.php?action=create"><button class="crud-button">Create</button></a>
        <a href="post.php?action=read"><button class="crud-button">Read</button></a>
        <a href="post.php?action=update"><button class="crud-button">Update</button></a>
        <a href="post.php?action=delete"><button class="crud-button">Delete</button></a>
    </div>

    <?php
    session_start();

    // Include necessary classes
    include "../classes/Db.class.php";
    include "../classes/Post.class.php";
    include "../classes/PostController.class.php";

    // Instantiate PostController
    $postController = new PostController('', '');

    // Check for the action parameter in the URL
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'create':
                ?>
                <h2>Create Post</h2>
                <form action="../includes/post.inc.php" method="post">
                    <input class="input-data" name="title" type="text" placeholder=" Title" required><br>
                    <textarea class="input-data" name="description" placeholder=" Description"></textarea><br>
                    <button class="submit-button" name="post-submit" type="submit">Create</button><br>
                </form>
                <?php
                break;

            case 'read':
                ?>
                <h2>Posts</h2>
                <?php
                // Fetch all posts
                $posts = $postController->fetchAllPosts();

                // Displaying posts in a table
                if ($posts && count($posts) > 0): ?>
                    <table>
                        <thead>
                        <tr>
                            <th>Post ID</th>
                            <th>Author ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date Created</th>
                            <th>Actions</th>
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
                                <td>
                                    <form action="../includes/post.inc.php" method="post" style="display:inline;">
                                        <input type="hidden" name="postId" value="<?php echo htmlspecialchars($post['postId']); ?>">
                                        <button class="submit-button" name="post-update" type="submit">Update</button>
                                    </form>
                                    <form action="post.php?action=delete" method="get" style="display:inline;">
                                        <input type="hidden" name="postId" value="<?php echo htmlspecialchars($post['postId']); ?>">
                                        <button class="submit-button" name="post-delete" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No posts available.</p>
                <?php endif; ?>
                <?php
                break;

            case 'update':
                ?>
                <h2>Update Post</h2>
                <form action="../includes/post.inc.php" method="post">
                    <input class="input-data" name="postId" type="text" placeholder="Post ID" required><br>
                    <input class="input-data" name="title" type="text" placeholder=" Title" required><br>
                    <textarea class="input-data" name="description" placeholder=" Description"></textarea><br>
                    <button class="submit-button" name="post-update" type="submit">Update</button><br>
                </form>
                <?php
                break;

            case 'delete':
                // Handle post deletion request
                if (isset($_POST['postId'])) {
                    $postId = $_POST['postId'];

                    // Fetch post details
                    $postDetails = $postController->fetchAllPosts();

                    // Find the post to delete
                    $postToDelete = null;
                    foreach ($postDetails as $post) {
                        if ($post['postId'] == $postId) {
                            $postToDelete = $post;
                            break;
                        }
                    }

                    if ($postToDelete) {
                        ?>
                        <h2>Do you really want to delete this post?</h2>
                        <p><strong>Post ID:</strong> <?php echo htmlspecialchars($postToDelete['postId']); ?></p>
                        <p><strong>Author ID:</strong> <?php echo htmlspecialchars($postToDelete['authorId']); ?></p>
                        <p><strong>Title:</strong> <?php echo htmlspecialchars($postToDelete['title']); ?></p>
                        <p><strong>Description:</strong> <?php echo htmlspecialchars($postToDelete['description']); ?></p>
                        <form action="../includes/post.inc.php" method="post">
                            <input type="hidden" name="postId" value="<?php echo htmlspecialchars($postToDelete['postId']); ?>">
                            <button class="submit-button" name="post-delete" type="submit">Delete This</button>
                        </form>
                        <a href="post.php?action=read"><button class="cancel-button">Cancel</button></a>
                        <?php
                    } else {
                        echo "<p>Post not found.</p>";
                    }
                } else {
                    ?>
                    <h2>Delete Post</h2>
                    <form action="post.php?action=delete" method="post">
                        <input class="input-data" name="postId" type="text" placeholder="Enter Post ID to delete" required><br>
                        <button class="submit-button" type="submit">Confirm Delete</button>
                    </form>
                    <?php
                }
                break;

            default:
                echo "<p>Please select an action.</p>";
        }
    }
    ?>
</div>
</body>
</html>
