<?php
/**
 * Database Connection Class using PDO
 * ------------------------------------
 * Handles secure connection to MySQL database.
 */
// define('BASE_URL', '/project/');

class Database {
    private $host = 'localhost';       // Database host
    private $db   = 'attendance_db';   // Database name
    private $user = 'root';            // Database username
    private $pass = '';                // Database password
    private $charset = 'utf8mb4';      // Charset

    public $pdo;

    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,          // Enable exceptions
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,     // Fetch associative arrays
            PDO::ATTR_EMULATE_PREPARES => false,                  // Disable emulation for security
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die(' Database Connection Failed: ' . $e->getMessage());
        }
    }
}