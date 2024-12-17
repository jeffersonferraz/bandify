<?php
require_once 'Db.class.php';

class Post extends Db {
    
    public function getPosts() {
        $stmt = $this->connect()->prepare('SELECT * FROM posts ORDER BY created_at DESC;');
        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../index.php?error=sql-statement-failed");
            exit();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostById($postId) {
        $stmt = $this->connect()->prepare('SELECT * FROM posts WHERE postId = ?;');
        if (!$stmt->execute(array($postId))) {
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

    protected function setPost($title, $description, $postCityId) {
        session_start();
        $authorId = $_SESSION["userId"];
        $stmt = $this->connect()->prepare('INSERT INTO posts (authorId, title, description, postCityId) VALUES (?, ?, ?, ?);');
        if (!$stmt->execute(array($authorId, $title, $description, $postCityId))) {
            $stmt = null;
            header("Location: ../index.php?error=sql-statement-failed");
            exit();
        }
    }

    protected function updatePost($postTitle, $postDescription, $postCityId, $postId) {

        // Check if post exists and matches author
        $stmt = $this->connect()->prepare('SELECT * FROM posts WHERE postId = ?;');
        if (!$stmt->execute(array($postId))) {
            $stmt = null;
            header("Location: ../index.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() === 0) {
            header("Location: ../index.php?error=no-post-found");
            exit();
        }

        // Update post
        $stmt = $this->connect()->prepare('UPDATE posts SET title = ?, description = ?, postCityId = ? WHERE postId = ?;');
        if (!$stmt->execute(array($postTitle, $postDescription, $postCityId, $postId))) {
            $stmt = null;
            header("Location: ../public/myPosts.php?error=sql-statement-failed");
            exit();
        }
    }

    public function deletePost($postId) {

        // Check if post exists
        $stmt = $this->connect()->prepare('SELECT * FROM posts WHERE postId = ?;');
        if (!$stmt->execute([$postId])) {
            $stmt = null;
            header("Location: ../public/myPosts.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() === 0) {
            header("Location: ../public/myPosts.php?error=post-does-not-exist");
            exit();
        }

        // Delete selected post
        $stmt = $this->connect()->prepare('DELETE FROM posts WHERE postId = ?;');


        if (!$stmt->execute([$postId])) {
            $stmt = null;
            header("Location: ../public/myPosts.php?error=sql-statement-failed");
            exit();
        }

        // Redirect to myPosts page after delete
        header("Location: ../public/myPosts.php?post-deleted");
        exit();
    }
}
?>
