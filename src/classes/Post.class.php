<?php

class Post extends Db {

    // Function to search for posts based on title only
    public function checkPost($postTitle) {
        // SQL query to select only based on title
        $stmt = $this->connect()->prepare('SELECT title FROM posts WHERE title LIKE ?;');

        // Using wildcards for title
        $title = "%" . $postTitle . "%";

        // Execute the statement and handle errors
        if (!$stmt->execute(array($title))) {
            $stmt = null;
            header("Location: ../index.php?error=sql-statement-failed");
            exit();
        }

        // Fetching results
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    protected function setPost($title, $description) {
        if (!isset($_SESSION["userId"])) {
            header("Location: ../index.php?error=user-not-logged-in"); // Weiterleitung, falls nicht eingeloggt
            exit();
        }

        $authorId = $_SESSION["userId"]; // Lese die userId aus der Session
        $stmt = $this->connect()->prepare('INSERT INTO posts (authorId, title, description, created_at) VALUES (?, ?, ?, NOW());');

        if (!$stmt->execute(array($authorId, $title, $description))) {
            $stmt = null;
            header("Location: ../index.php?error=sql-statement-failed");
            exit();
        }

        $stmt = null;
    }
}
