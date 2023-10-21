<?php

$request = $_SERVER['REQUEST_URI'];
$viewDir = '/resources/views/';

switch ($request) {
        // Default route
    case '':
    case '/':
        require __DIR__ . $viewDir . 'index.php';
        break;

        // Signup routes
    case '/signup':
        require __DIR__ . $viewDir . '/auth/signup.php';
        break;

    case '/signup?error=full_name':
        require __DIR__ . $viewDir . '/auth/signup.php';
        break;

    case '/signup?error=username':
        require __DIR__ . $viewDir . '/auth/signup.php';
        break;

    case '/signup?error=email':
        require __DIR__ . $viewDir . '/auth/signup.php';
        break;

    case '/signup?error=password':
        require __DIR__ . $viewDir . '/auth/signup.php';
        break;

    case '/signup?error=password_repeat':
        require __DIR__ . $viewDir . '/auth/signup.php';
        break;

    case '/signup?error=pass_not_match':
        require __DIR__ . $viewDir . '/auth/signup.php';
        break;

    case '/signup?error=email-exists':
        require __DIR__ . $viewDir . '/auth/signup.php';
        break;

        // Login routes
    case '/login':
        require __DIR__ . $viewDir . '/auth/login.php';
        break;

    case '/login?error=do_you_even_exists':
        require __DIR__ . $viewDir . '/auth/login.php';
        break;

    case '/reset':
        require  __DIR__ . $viewDir . '/auth/reset_password.php';
        break;

    case '/verify':
        require __DIR__ . $viewDir . '/auth/verify_code.php';
        break;

    case '/update':
        require __DIR__ . $viewDir . '/auth/update_password.php';
        break;

        // User routes
    case '/home':
        require __DIR__ . $viewDir . '/user/dashboard.php';
        break;

    case '/edit':
        require __DIR__ . $viewDir . '/user/edit_profile/edit_profile.php';
        break;

    case '/edit_password':
        require __DIR__ . $viewDir . 'user/edit_profile/edit_password.php';
        break;

    case '/profile':
        require __DIR__ . $viewDir . 'user/profile.php';
        break;

        // Admin routes
    case '/admin':
        require __DIR__ . $viewDir . '/admin/dashboard.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}
