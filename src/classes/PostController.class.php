<?php

class PostController extends Post {

    private $postTitle;
    private $postDescription; // Post description

    public function __construct($postTitle, $postDescription) {
        $this->postTitle = $postTitle;
        $this->postDescription = $postDescription; // Initialize description
    }

    // Function that checks for an existing post and creates a new one if it doesn't exist
    public function createPost() {
        if ($this->emptyInput() == false) {
            header("Location: ../index.php?error=empty-input");
            exit();
        }

        // Check if the post already exists
        $existingPost = $this->checkPost($this->postTitle);

        if (empty($existingPost)) {
            // Create the post if it doesn't exist
            $this->setPost($this->postTitle, $this->postDescription);
            header("Location: ../index.php?error=none"); // Redirect to homepage on success
        } else {
            header("Location: ../index.php?error=post-exists"); // Post already exists
        }
    }

    private function emptyInput() {
        return !empty($this->postTitle); // Check if postTitle is filled
    }
}
