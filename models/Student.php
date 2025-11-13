<?php
/**
 * Student Model
 * --------------
 * Handles CRUD operations for student records.
 */

class Student {
    private $db;

    public function __construct() {
        $this->db = (new Database())->pdo;
    }

    /**
     * Fetch all students
     */
    public function all() {
        $stmt = $this->db->query('SELECT * FROM students ORDER BY id DESC');
        return $stmt->fetchAll();
    }

    /**
     * Find a single student by ID
     */
    public function find($id) {
        $stmt = $this->db->prepare('SELECT * FROM students WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /**
     * Create a new student record
     */
    public function create($data) {
        $stmt = $this->db->prepare('INSERT INTO students (roll_no, name, class) VALUES (?, ?, ?)');
        return $stmt->execute([
            $data['roll_no'],
            $data['name'],
            $data['class']
        ]);
    }

    /**
     * Update an existing student record
     */
    public function update($id, $data) {
        $stmt = $this->db->prepare('UPDATE students SET roll_no = ?, name = ?, class = ? WHERE id = ?');
        return $stmt->execute([
            $data['roll_no'],
            $data['name'],
            $data['class'],
            $id
        ]);
    }

    /**
     * Delete a student record
     */
    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM students WHERE id = ?');
        return $stmt->execute([$id]);
    }
}