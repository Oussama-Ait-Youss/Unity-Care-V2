<?php
session_start();

// Require the Auth Controller (Always needed for login/logout)
require_once __DIR__ . '/../app/Controllers/AuthController.php';

// 1. Change Default Action to 'home' (Landing Page)
$action = $_GET['action'] ?? 'home';

switch ($action) {
    
    // --- PUBLIC PAGES ---
    case 'home':
        require __DIR__ . '/../app/Views/home.php';
        break;

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

    // --- ADMIN SECTION ---
    case 'admin_dashboard':
        // Security Check: Is user logged in AND is he an admin?
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
            header('Location: index.php?action=login_form');
            exit;
        }
        require __DIR__ . '/../app/Views/admin/dashboard.php';
        break;

    case 'doctors':
        // Security Check (Same as dashboard)
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
            header('Location: index.php?action=login_form');
            exit;
        }
        // Load the Doctor Controller and show the list
        require_once __DIR__ . '/../app/Controllers/DoctorController.php';
        $controller = new DoctorController();
        $controller->index();
        break;

    // --- DOCTOR SECTION ---
    case 'doctor_dashboard':
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'doctor') {
            header('Location: index.php?action=login_form');
            exit;
        }
        require __DIR__ . '/../app/Views/doctor/dashboard.php';
        break;

    // --- PATIENT SECTION ---
    case 'patient_dashboard':
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'patient') {
            header('Location: index.php?action=login_form');
            exit;
        }
        require __DIR__ . '/../app/Views/patient/dashboard.php';
        break;

    // --- 404 ERROR ---
    default:
        http_response_code(404);
        require __DIR__ . '/../app/Views/404.php';
        break;
}