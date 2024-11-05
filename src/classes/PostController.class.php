<?php
require_once 'Post.class.php';

class PostController extends Post {
    private $postTitle;
    private $postDescription;

    public function __construct($postTitle, $postDescription) {
        $this->postTitle = $postTitle;
        $this->postDescription = $postDescription;
    }

    public function createPost() {
        if ($this->emptyInput() == false) {
            header("Location: ../index.php?error=empty-input");
            exit();
        }

        $existingPost = $this->checkPost($this->postTitle);
        if (empty($existingPost)) {
            $this->setPost($this->postTitle, $this->postDescription);
            header("Location: ../index.php?error=none");
        } else {
            header("Location: ../index.php?error=post-exists");
        }
    }

    public function updatePost($postId, $title, $description) {
        if (empty($postId) || empty($title) || empty($description)) {
            header("Location: ../index.php?error=empty-input");
            exit();
        }

        // Call the parent update method
        parent::updatePost($postId, $title, $description);
    }

    public function fetchAllPosts() {
        return $this->getPosts();
    }

    public function fetchPostById($postId, $userId) {
        $stmt = $this->connect()->prepare('SELECT * FROM posts WHERE postId = ? AND authorId = ?;');
        if (!$stmt->execute([$postId, $userId])) {
            $stmt = null;
            header("Location: ../index.php?error=sql-statement-failed");
            exit();
        }

        if ($stmt->rowCount() === 0) {
            return null; // Post nicht gefunden
        }

        return $stmt->fetch(PDO::FETCH_ASSOC); // Gibt den gefundenen Post zurück
    }

    private function emptyInput() {
        return !empty($this->postTitle);
    }
}
?>
