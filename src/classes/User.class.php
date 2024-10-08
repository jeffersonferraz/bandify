<?php

require 'Database.class.php';

class User {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Erstellt einen neuen Benutzer
    public function create($data = []) {

        // Valedierung für leere input Felder
        if (empty($data['firstname']) || empty($data['lastname']) || empty($data['email']) || empty($data['password'])) {

            return false;
        }

        $query = "INSERT INTO users (firstname, lastname, email, password)
                VALUES (:firstname, :lastname, :email, :password)";

        $this->db->query($query, $data);

        return true;
    }

    // Liest einen Benutzer anhand der ID
    public function read($userId) {

        $query = "SELECT * FROM users WHERE userid = :userId";

        $this->db->query($query, ['userId' => $userId]);
    }

    // Aktualisiert einen Benutzer
    public function update($userId, $data = []) {

        $data['userId'] = $userId;
        
        $query = "UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, password = :password, city = :city, instrument1 = :instrument1, instrument2 = :instrument2, instrument3 = :instrument3, influence1 = :influence1, influence2 = :influence2, influence3 = :influence3, bio = :bio WHERE userid = :userId";

        $this->db->query($query, $data);
    }

    // Löscht einen Benutzer
    public function delete($userId) {

        $query = "DELETE FROM users WHERE userid = :userId";

        $this->db->query($query, ['userId' => $userId]);
    }

    // Erstellt einen neuen search post
    public function createSearchPost($userId, $title, $body) {

        $query = "INSERT INTO searchPosts (authorId, title, body, created_at) VALUES (:userId, :title, :body)";

        $this->db->query($query, ['userId' => $userId, 'title' => $title, 'body' => $body]);
    }
}
