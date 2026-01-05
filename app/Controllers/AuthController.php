<?php
require_once __DIR__ . '/../Repositories/UserRepository.php';

class AuthController {
    private $userRepo;

    public function __construct() {
        $this->userRepo = new UserRepository();
    }

    // Handle the Login Request
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // 1. Check DB
            $user = $this->userRepo->findByEmail($email);

            // 2. Verify Password
            if ($user && $user->verifyPassword($password)) {
                // 3. Login Success: Store in Session
                $_SESSION['user_id'] = $user->getId();
                $_SESSION['user_role'] = $user->getRole();
                $_SESSION['user_name'] = $user->getUsername();

                // 4. Redirect based on Role
                if ($user->getRole() === 'admin') {
                    header("Location: index.php?action=admin_dashboard");
                } elseif ($user->getRole() === 'doctor') {
                    header("Location: index.php?action=doctor_dashboard");
                } else {
                    header("Location: index.php?action=patient_dashboard");
                }
                exit;
            } else {
                // 5. Login Failed
                $_SESSION['error'] = "Invalid email or password.";
                header("Location: index.php?action=login_form");
                exit;
            }
        }
    }

    // Show the Form
    public function showLoginForm() {
        require __DIR__ . '/../Views/auth/login.php';
    }

    // Handle Logout
    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?action=login_form");
        exit;
    }
}