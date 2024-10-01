<?php

require 'Database.class.php';

class User {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Erstellt einen neuen Benutzer
    public function create($data = []) {

        $query = "INSERT INTO users (firstname, lastname, email, password)
                VALUES (:firstname, :lastname, :email, :password)";

        $this->db->query($query, $data);
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
}
