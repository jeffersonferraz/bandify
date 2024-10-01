<?php

require 'Database.class.php';

class Search {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Creates a new search post
    public function create($data = []) {
        $query = "INSERT INTO searchPosts (title, body, created_at)
                  VALUES (:title, :body, NOW())";

        $this->db->query($query, $data);
    }

    // Reads a search post by its ID
    public function read($searchPostId) {
        $query = "SELECT * FROM searchPosts WHERE searchPostId = :searchPostId";

        return $this->db->query($query, ['searchPostId' => $searchPostId]);
    }

    // Updates an existing search post
    public function update($searchPostId, $data = []) {
        $data['searchPostId'] = $searchPostId;

        $query = "UPDATE searchPosts SET title = :title, body = :body, created_at = NOW()
                  WHERE searchPostId = :searchPostId";

        $this->db->query($query, $data);
    }

    // Deletes a search post
    public function delete($searchPostId) {
        $query = "DELETE FROM searchPosts WHERE searchPostId = :searchPostId";

        $this->db->query($query, ['searchPostId' => $searchPostId]);
    }
}
