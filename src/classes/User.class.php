<?php

require 'Database.class.php';

class User {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Creates a new user
    public function create($data = []) {
        error_log(print_r($data, true)); // Debugging output

        $query = "INSERT INTO users (firstname, lastname, email, password)
                  VALUES (:firstname, :lastname, :email, :password)";
        return $this->db->query($query, $data); // Return the result of the query
    }

    // Reads a user by ID
    public function read($userId) {
        $query = "SELECT * FROM users WHERE userid = :userId";
        return $this->db->query($query, ['userId' => $userId]); // Return user data
    }

    // Updates a user
    public function update($userId, $data = []) {
        $data['userId'] = $userId;
        $query = "UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, password = :password WHERE userid = :userId";
        return $this->db->query($query, $data);
    }

    // Deletes a user
    public function delete($userId) {
        $query = "DELETE FROM users WHERE userid = :userId";
        return $this->db->query($query, ['userId' => $userId]);
    }

    // Login method
    public function login($data = []) {
        $query = "SELECT * FROM users WHERE email = :email AND password = :password"; // Note: In a real application, do NOT store plain text passwords!
        $result = $this->db->query($query, $data);
        return !empty($result); // Return true if user exists
    }
}
