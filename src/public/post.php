<?php
session_start();
include "../classes/Db.class.php";
include "../classes/Post.class.php";
include "../classes/PostController.class.php";
?>
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
    $postController = new PostController('', '');

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
                $posts = $postController->fetchAllPosts();
                if ($posts && count($posts) > 0): ?>
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
                ?>
                <h2>Delete Post</h2>
                <form action="../includes/post.inc.php" method="post">
                    <input class="input-data" name="postId" type="text" placeholder="Enter Post ID to delete" required><br>
                    <button class="submit-button" name="post-delete" type="submit">Confirm Delete</button>
                </form>
                <?php
                break;

            default:
                echo "<p>Please select an action.</p>";
        }
    }
    ?>
</div>
</body>
</html>
