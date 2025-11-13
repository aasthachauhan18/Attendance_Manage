<?php
/**
 * Attendance Model
 * ----------------
 * Handles marking attendance and generating attendance reports.
 */

class Attendance {
    private $db;

    public function __construct() {
        $this->db = (new Database())->pdo;
    }

    /**
     * Mark or update attendance for a student on a specific date
     */
    public function mark($student_id, $date, $status, $marked_by = null) {
        $stmt = $this->db->prepare("
            INSERT INTO attendance (student_id, `date`, status, marked_by)
            VALUES (?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE
                status = VALUES(status),
                marked_by = VALUES(marked_by)
        ");
        return $stmt->execute([$student_id, $date, $status, $marked_by]);
    }

    /**
     * Get attendance for a specific date
     */
    public function getByDate($date) {
        $stmt = $this->db->prepare("
            SELECT a.*, s.name, s.roll_no
            FROM attendance a
            JOIN students s ON a.student_id = s.id
            WHERE a.`date` = ?
            ORDER BY s.roll_no
        ");
        $stmt->execute([$date]);
        return $stmt->fetchAll();
    }

    /**
     * Generate report for a date range
     */
    public function reportRange($from, $to) {
        $stmt = $this->db->prepare("
            SELECT s.id, s.roll_no, s.name,
                SUM(status = 'present') AS presents,
                SUM(status = 'absent') AS absents,
                SUM(status = 'leave') AS leaves
            FROM students s
            LEFT JOIN attendance a
                ON s.id = a.student_id
                AND a.`date` BETWEEN ? AND ?
            GROUP BY s.id
            ORDER BY s.roll_no
        ");
        $stmt->execute([$from, $to]);
        return $stmt->fetchAll();
    }
}