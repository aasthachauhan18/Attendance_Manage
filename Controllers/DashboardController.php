<?php
class DashboardController {
    public function index() {
        include __DIR__ . '/../views/header.php';
        include __DIR__ . '/../views/dashboard.php';
        include __DIR__ . '/../views/footer.php';
    }
}