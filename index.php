<?php
session_start();

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/models/User.php';
require_once __DIR__ . '/models/Student.php';
require_once __DIR__ . '/models/Attendence.php';
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/StudentController.php';
require_once __DIR__ . '/controllers/AttendenceController.php';
require_once __DIR__ . '/controllers/DashboardController.php';

// ====================================================
// Basic Router
// ====================================================
$route = $_GET['route'] ?? '';
$parts = explode('/', trim($route, '/'));
$controller = $parts[0] ?? '';
$action = $parts[1] ?? '';

// ====================================================
// Public Routes (Login / Logout)
// ====================================================
if ($controller === 'login' || $route === 'login' || $route === 'auth/login') {
    (new AuthController())->login();
    exit;
}

if ($route === 'logout') {
    (new AuthController())->logout();
    exit;
}

// ====================================================
// Protect Private Routes (Require Login)
// ====================================================
if (!isset($_SESSION['user'])) {
    header('Location: ' . BASE_URL . '?route=login');
    exit;
}

// ====================================================
// Default Dashboard Route
// ====================================================
if ($route === '' || $route === 'dashboard') {
    (new DashboardController())->index();
    exit;
}

// ====================================================
// Route Mapping
// ====================================================
switch ($controller) {

    // ------------------ STUDENTS ------------------
    case 'students':
        $ctrl = new StudentController();
        if ($action === 'create') $ctrl->create();
        elseif ($action === 'store') $ctrl->store();
        elseif ($action === 'edit') $ctrl->edit($parts[2] ?? null);
        elseif ($action === 'update') $ctrl->update($parts[2] ?? null);
        elseif ($action === 'delete') $ctrl->delete($parts[2] ?? null);
        else $ctrl->index();
        break;

    // ------------------ ATTENDANCE ------------------
    case 'attendance':
        $ctrl = new AttendanceController();
        if ($action === 'mark') $ctrl->mark();
        elseif ($action === 'store') $ctrl->store();
        elseif ($action === 'report') $ctrl->report();
        else $ctrl->mark();
        break;

    // ------------------ DEFAULT ------------------
    default:
        header('HTTP/1.0 404 Not Found');
        echo "<h2>404 - Page Not Found</h2>";
}