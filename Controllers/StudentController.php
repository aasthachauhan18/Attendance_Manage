<?php
/**
 * StudentController
 * -----------------
 * Handles student CRUD operations (Create, Read, Update, Delete).
 */

class StudentController {
    private $model;

    public function __construct() {
        $this->model = new Student();
    }

    /**
     * List all students
     */
    public function index() {
        $students = $this->model->all();
        include __DIR__ . '/../views/header.php';
        include __DIR__ . '/../views/students/index.php';
        include __DIR__ . '/../views/footer.php';
    }

    /**
     * Show create form
     */
    public function create() {
        include __DIR__ . '/../views/header.php';
        include __DIR__ . '/../views/students/create.php';
        include __DIR__ . '/../views/footer.php';
    }

    /**
     * Store new student in DB
     */
    public function store() {
        if (!empty($_POST['roll_no']) && !empty($_POST['name'])) {
            $this->model->create($_POST);
        }
        header('Location: ' . BASE_URL . '?route=students');
        exit;
    }

    /**
     * Show edit form
     */
    public function edit($id) {
        $student = $this->model->find($id);
        include __DIR__ . '/../views/header.php';
        include __DIR__ . '/../views/students/edit.php';
        include __DIR__ . '/../views/footer.php';
    }

    /**
     * Update student record
     */
    public function update($id) {
        if (!empty($_POST['roll_no']) && !empty($_POST['name'])) {
            $this->model->update($id, $_POST);
        }
        header('Location: ' . BASE_URL . '?route=students');
        exit;
    }

    /**
     * Delete student
     */
    public function delete($id) {
        $this->model->delete($id);
        header('Location: ' . BASE_URL . '?route=students');
        exit;
    }
}