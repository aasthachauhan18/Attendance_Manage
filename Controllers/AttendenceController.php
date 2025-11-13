<?php
/**
 * AttendanceController
 * --------------------
 * Handles attendance marking and reporting.
 */

class AttendanceController {
    private $studentModel;
    private $attendanceModel;

    public function __construct() {
        $this->studentModel = new Student();
        $this->attendanceModel = new Attendance();
    }

    /**
     * Display attendance marking form
     */
    public function mark() {
        $students = $this->studentModel->all();
        $date = $_GET['date'] ?? date('Y-m-d');

        $existing = $this->attendanceModel->getByDate($date);
        $indexed = [];
        foreach ($existing as $e) {
            $indexed[$e['student_id']] = $e;
        }

        include __DIR__ . '/../views/header.php';
        include __DIR__ . '/../views/attendence/mark.php';
        include __DIR__ . '/../views/footer.php';
    }

    /**
     * Save attendance data
     */
    public function store() {
        $date = $_POST['date'] ?? date('Y-m-d');
        $marked_by = $_SESSION['user']['id'] ?? null;
        $statuses = $_POST['status'] ?? [];

        foreach ($statuses as $student_id => $status) {
            $this->attendanceModel->mark($student_id, $date, $status, $marked_by);
        }

        header('Location: ' . BASE_URL . '?route=attendance/mark&date=' . $date);
        exit;
    }

    /**
     * Show attendance report by date range
     */
    public function report() {
        $from = $_GET['from'] ?? date('Y-m-01');
        $to = $_GET['to'] ?? date('Y-m-d');

        $report = $this->attendanceModel->reportRange($from, $to);

        include __DIR__ . '/../views/header.php';
        include __DIR__ . '/../views/attendence/report.php';
        include __DIR__ . '/../views/footer.php';
    }
}