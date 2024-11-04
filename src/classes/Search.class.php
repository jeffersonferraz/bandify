<?php

class Search extends Db {

    // Function to search for bands based on band name only
    public function checkSearch($bandTitle) {
        // SQL query to select only based on groupName
        $stmt = $this->connect()->prepare('SELECT groupName FROM musicGroups WHERE groupName LIKE ?;');

        // Using wildcards for band name
        $title = "%" . $bandTitle . "%";

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

    protected function setSearch($groupName, $groupDescription) {
        $userId = 1; // Set the userId to 1 for testing purposes
        $stmt = $this->connect()->prepare('INSERT INTO musicGroups (userId, groupName, groupDescription, created_at) VALUES (?, ?, ?, NOW());');

        if (!$stmt->execute(array($userId, $groupName, $groupDescription))) {
            $stmt = null;
            header("Location: ../index.php?error=sql-statement-failed");
            exit();
        }

        $stmt = null;
    }
}
