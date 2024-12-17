<?php
require_once 'Post.class.php';

class PostController extends Post {

    public function fetchAllPosts() {
        return $this->getPosts();
    }

    public function fetchPost($postId) {
        return $this->getPostById($postId);
    }

    public function createPost($postTitle, $postDescription, $postCityId) {

        $existingPost = $this->checkPost($postTitle);

        if (empty($existingPost)) {
            $this->setPost($postTitle, $postDescription, $postCityId);
        } else {
            header("Location: ../createPost.php?error=post-exists");
        }
    }

    public function updatePost($postTitle, $postDescription, $postCityId, $postId) {

        // Call the parent update method
        parent::updatePost($postTitle, $postDescription, $postCityId, $postId);
    }
}
?>
