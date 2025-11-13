<?php
/**
 * AuthController
 * ----------------
 * Handles user authentication (login/logout).
 */

// echo"called";
// exit;
class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    /**
     * Show login form and process login
     */
    public function login() {
        $error = '';
// echo"called method";
// exit;
        // echo "<pre>";
        // print_r($_SERVER['REQUEST_METHOD']);
        // echo "</pre>";

        include __DIR__ . '/../views/auth/login.php';
        // exit;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // echo "inside if";
            // exit;
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');

            $user = $this->userModel->findByEmail($email,$password);
            
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
            // if ($user && password_verify($password, $user['password'])) {
            if ($user) {
                unset($user['password']);
                // echo "called inside if";
                // exit;
                $_SESSION['user'] = $user;
                header('Location: ' . BASE_URL . '?route=dashboard');
                exit;
            } else {
                $error = 'Invalid email or password';
            }
        }

        
    }

    /**
     * Logout and destroy session
     */
    public function logout() {
        session_unset();
        session_destroy();
        header('Location: ' . BASE_URL . '?route=login');
        exit;
    }
}