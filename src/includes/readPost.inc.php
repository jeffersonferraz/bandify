<?php
require_once '../classes/PostController.class.php';

$postController = new PostController('', '');
$posts = $postController->fetchAllPosts();

if ($posts && count($posts) > 0) {
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Post ID</th>';
    echo '<th>Author ID</th>';
    echo '<th>Title</th>';
    echo '<th>Description</th>';
    echo '<th>Date Created</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($posts as $post) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($post['postId']) . '</td>';
        echo '<td>' . htmlspecialchars($post['authorId']) . '</td>';
        echo '<td>' . htmlspecialchars($post['title']) . '</td>';
        echo '<td>' . htmlspecialchars($post['description']) . '</td>';
        echo '<td>' . htmlspecialchars($post['created_at']) . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p>No posts available.</p>';
}
?>
