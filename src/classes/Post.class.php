<?php
require_once 'Db.class.php';

class Post extends Db {
    public function getPosts() {
        $stmt = $this->connect()->prepare('SELECT * FROM posts;');
        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../index.php?error=sql-statement-failed");
            exit();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function checkPost($postTitle) {
        $stmt = $this->connect()->prepare('SELECT title FROM posts WHERE title LIKE ?;');
        $title = "%" . $postTitle . "%";
        if (!$stmt->execute(array($title))) {
            $stmt = null;
            header("Location: ../index.php?error=sql-statement-failed");
            exit();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function setPost($title, $description) {
        if (!isset($_SESSION["userId"])) {
            header("Location: ../index.php?error=user-not-logged-in");
            exit();
        }
        $authorId = $_SESSION["userId"];
        $stmt = $this->connect()->prepare('INSERT INTO posts (authorId, title, description, created_at) VALUES (?, ?, ?, NOW());');
        if (!$stmt->execute(array($authorId, $title, $description))) {
            $stmt = null;
            header("Location: ../index.php?error=sql-statement-failed");
            exit();
        }
    }

    protected function updatePost($postId, $title, $description) {
        if (!isset($_SESSION["userId"])) {
            header("Location: ../index.php?error=user-not-logged-in");
            exit();
        }
        $authorId = $_SESSION["userId"];

        // Check if post exists and matches author
        $stmt = $this->connect()->prepare('SELECT * FROM posts WHERE postId = ? AND authorId = ?;');
        if (!$stmt->execute([$postId, $authorId])) {
            $stmt = null;
            header("Location: ../index.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() === 0) {
            header("Location: ../index.php?error=no-post-found");
            exit();
        }

        // Update post
        $stmt = $this->connect()->prepare('UPDATE posts SET title = ?, description = ?, created_at = NOW() WHERE postId = ? AND authorId = ?;');
        if (!$stmt->execute([$title, $description, $postId, $authorId])) {
            $stmt = null;
            header("Location: ../index.php?error=sql-statement-failed");
            exit();
        }

        // Redirect to index page after successful update
        header("Location: ../index.php?error=none&message=Post successfully updated.");
        exit();
    }

    public function deletePost($postId) {
        if (!isset($_SESSION["userId"])) {
            header("Location: ../index.php?error=user-not-logged-in");
            exit();
        }

        $authorId = $_SESSION["userId"];

        // Check if post exists and matches author
        $stmt = $this->connect()->prepare('SELECT * FROM posts WHERE postId = ? AND authorId = ?;');
        if (!$stmt->execute([$postId, $authorId])) {
            $stmt = null;
            header("Location: ../index.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() === 0) {
            header("Location: ../index.php?error=no-post-found");
            exit();
        }

        // Anonymize the post, keeping the original authorId
        $stmt = $this->connect()->prepare('UPDATE posts SET title = "null", description = "null", created_at = "2000-01-01 00:00:01" WHERE postId = ?;');
        if (!$stmt->execute([$postId])) {
            $stmt = null;
            header("Location: ../index.php?error=sql-statement-failed");
            exit();
        }

        // Redirect to index page after successful delete
        header("Location: ../index.php?error=none&message=Post successfully deleted.");
        exit();
    }
}
?>
