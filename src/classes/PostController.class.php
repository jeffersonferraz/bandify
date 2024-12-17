<?php
require_once 'Post.class.php';

class PostController extends Post {
    private $postTitle;
    private $postDescription;
    private $postCityId;

    // public function __construct($postTitle, $postDescription, $postCityId) {
    //     $this->postTitle = $postTitle;
    //     $this->postDescription = $postDescription;
    //     $this->postCityId = $postCityId;
    // }

    public function fetchAllUserPosts() {
        return $this->getPosts();
    }

    public function createPost($postTitle, $postDescription, $postCityId) {

        $existingPost = $this->checkPost($postTitle);

        if (empty($existingPost)) {
            $this->setPost($postTitle, $postDescription, $postCityId);
            header("Location: ../myPosts.php?error=none");
        } else {
            header("Location: ../createPost.php?error=post-exists");
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
        return !empty($postTitle);
    }
}
?>
