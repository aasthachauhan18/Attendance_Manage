<?php
/**
 * User Model
 * ------------
 * Handles database operations for user authentication.
 */

class User {
    private $db;

    public function __construct() {
        $this->db = (new Database())->pdo;
    }

    /**
     * Find user by email
     */
    public function findByEmail($email,$pass) {
        // echo "'SELECT * FROM users WHERE email = ? LIMIT 1'";
        // echo $email;
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1');
        $stmt->execute([$email,$pass]);
        return $stmt->fetch();
    }
}