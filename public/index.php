<?php
session_start();

require_once __DIR__ . '/../app/Controllers/AuthController.php';


$action = $_GET['action'] ?? 'login_form'; // Default page is login

switch ($action) {
    case 'login_form':
        $controller = new AuthController();
        $controller->showLoginForm();
        break;

    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    // --- Placeholders for Dashboards (We will create these next) ---
    case 'admin_dashboard':
        // Check if user is logged in first! (Basic Security)
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
            header('Location: index.php?action=login_form');
            exit;
        }
        require __DIR__ . '/../app/Views/admin/dashboard.php';
        break;

    case 'doctor_dashboard':
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'doctor') {
            header('Location: index.php?action=login_form');
            exit;
        }
        require __DIR__ . '/../app/Views/doctor/dashboard.php';
        break;

    case 'patient_dashboard':
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'patient') {
            header('Location: index.php?action=login_form');
            exit;
        }
        require __DIR__ . '/../app/Views/patient/dashboard.php';
        break;

    default:
        echo "404 - Page Not Found";
        break;
}