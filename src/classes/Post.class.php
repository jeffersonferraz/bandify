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
}
?>
