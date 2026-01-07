<?php
// Pas besoin de namespace si vous n'en utilisez pas ailleurs, sinon ajoutez: namespace App\Controllers;
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

            // 1. Check DB (Renvoie un tableau ou null)
            $user = $this->userRepo->findByEmail($email);

            // 2. Vérification : On vérifie si $user existe ET on compare le mot de passe
            // ATTENTION : On utilise password_verify() directement ici car $user est un tableau
            if ($user && password_verify($password, $user['password'])) {
                
                // 3. Login Success: On stocke les données du tableau
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = $user['role'];
                $_SESSION['user_name'] = $user['username'];

                // 4. Redirection selon le rôle
                if ($user['role'] === 'admin') {
                    header("Location: index.php?action=admin_dashboard");
                } elseif ($user['role'] === 'doctor') {
                    header("Location: index.php?action=doctor_dashboard");
                } else {
                    header("Location: index.php?action=patient_dashboard");
                }
                exit;
            } else {
                // 5. Login Failed
                $_SESSION['error'] = "Email ou mot de passe incorrect.";
                header("Location: index.php?action=login_form");
                exit;
            }
        }
    }

    // ... le reste est bon
    public function showLoginForm() {
        require __DIR__ . '/../Views/auth/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?action=login_form");
        exit;
    }
}